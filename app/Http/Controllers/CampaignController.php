<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Lib\Helper;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Share;
use App\Models\View;
use App\Models\Document;
use App\Models\Album;
use App\Models\Update;

class CampaignController extends Controller {
    
    
    
    public function indexGuestCampaign(Request $request, $categoryId='1'){
        $categories = Category::all();
        $active = $categoryId;
        $campaigns = Campaign::where('category_id', $categoryId)->where('status', 1)->paginate(4);
        return view('face.campaign-master', compact('request', 'categories', 'active', 'campaigns'));
    }
    
    public function indexSearchedCampaign(Request $request) {
        $rules = [
            'q' => 'string:500',
            'category_id' => 'numeric',
        ];
        $validated = $this->validate($request, $rules);
        
        $categories = Category::all();
        $active = $request->category_id;
        $campaigns = Campaign::where('category_id', $validated['category_id'])->orWhere('short_description', 'like', "%{$validated['q']}%")->orWhere('description', 'like', "%{$validated['q']}%")->paginate(4);
        return view('face.campaign-master', compact('request', 'categories', 'active', 'campaigns'));
    }
    
    public function indexFilteredCampaign(Request $request) {
        $categories = Category::all();
        $active = $request->category_id;
        $campaigns = Campaign::where('category_id', $request->category_id)->paginate(4);
        return view('face.campaign-master', compact('request', 'categories', 'active', 'campaigns'));
    }

    /*
     * shows a campaign on the basis of it's id which is provided by the master page.
     * it records each show before showing.
     */
    public function showGuestCampaign($campaignId){
        session(['adminCampaignsUrl' => URL::previous()]);
        $campaign = Campaign::find($campaignId);
        if($campaign){
            // every show of any campaign is recoreded by this portion.
            // but recorded only if the visitor is logged in and not campaign creator himself.
            if (Auth::check() && (Auth::user()->id !== $campaign->user_id)) {
                $data = [
                    'user_id' => Auth::user()->id,
                    'campaign_id' => $campaign->id,
                ];
                View::create($data);
            }
            
            return view('face.campaign-detail', compact('campaign'));
        }
        else {
            return view('face.campaign-not-found');
        }
    }
    
    
    
    public function f($map) {
        if($map->contains()->key()){
            $map->value++;
        }
        else {
            $map->add()->key;
            $map->value = 1;
        }
    }
    
    
    
    /*
     * donor activities starts
     */
    public function indexDonatedCampaign(Request $request){
        if(Auth::check()){
            $userId = Auth::user()->id;
            $donations = Donation::where('user_id', $userId)->get();
            // just converting donation to campaign
            $campaigns = $donations->map(function($donation){
                return $donation->campaign;
            });
            
            // taking only one occurance of each campaign elininating
            // the duplicate occurance but counting the occurance number
            $campaigns = $campaigns->groupBy('id')->map(function ($aGroup) {
                // as we need only one of each group. this map iterates once
                // for each group
                $first = $aGroup[0];
                $first->count = $aGroup->count();
                return $first;
            });
            return view('campaign.campaigns-list', compact('request', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexSupportedCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $likes = Like::where('user_id', $user->id)->get();
            $campaigns = $likes->map(function($like, $key){
                return $like->campaign;
            });
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexSharedCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $shares = Share::where('user_id', $user->id)->get();
            $campaigns = $shares->map(function($share, $key){
                return $share->campaign;
            });
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexCommentedCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $comments = Comment::where('user_id', $user->id)->distinct()->get(['campaign_id']);
            $campaigns = $comments->map(function($comment, $key){
                return $comment->campaign;
            });
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    // views is counted by when user clicks on a tile to see it's detail.
    public function indexViewedCampaign(Request $request){
        if(Auth::check()){
            $userId = Auth::user()->id;
            $views = View::where('user_id', $userId)->get();
            // just converting views to campaign
            $campaigns = $views->map(function($view, $key){
                return $view->campaign;
            });
            
            // taking only one occurance of each campaign elininating
            // the duplicate occurance but counting the occurance number
            $campaigns = $campaigns->groupBy('id')->map(function ($aGroup) {
                // as we need only one of each group. this map iterates once
                // for each group
                $first = $aGroup[0];
                $first->count = $aGroup->count();
                return $first;
            });
            
            // rejects the campaigns which are create by the campaigner himself
            $campaigns = $campaigns->reject(function ($value){
                if(Auth::user()->id === $value->user_id){
                    return true;
                }
            });
            return view('campaign.campaigns-list', compact('request', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    /*
     * donor activities ends
     */
    
    
    
    
    
    
    /*
     * campaigner activities starts
     */
    public function indexMyCampaignsPanel() {
        return view('campaign.campaigns-panel-mine');
    }
    
    public function indexMyAllCampaign(Request $request){
        if(Auth::check()){
            $title = 'My All Campaign';
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->paginate(5);
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns', 'title'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyActiveCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->get()->filter(function($value, $key){
                return $value->isActive();
            });
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyCompletedCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->get()->filter(function($value, $key){
                return $value->isCompleted();
            });
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyPendingCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 0)->get();
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyCancelledCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 2)->get();
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyBlockedCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 3)->get();
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyDeclinedCampaign(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 4)->get();
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    /*
     * campaigner activities ends
     */
    
    
    
    
    
    
    
    

    /*
     * admin activities starts
     */
    public function indexAdminCampaignPanel(Request $request){
        return view('campaign.campaigns-panel-admin');
    }
    
    public function indexAdminAllCampaign(Request $request){
        $allCampaigns = Campaign::paginate(15);
        return view('campaign.campaigns')->with('campaigns', $allCampaigns);
    }

    public function indexAdminActiveCampaign(Request $request){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $activeCampaigns = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
            return $value->isActive();
        });
        
        return view('campaign.campaigns')->with('campaigns', $activeCampaigns);
    }
    
    public function indexAdminCompletedCampaign(Request $request){
        $completedCampaigns = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
            return $value->isCompleted();
        });
        
        return view('campaign.campaigns')->with('campaigns', $completedCampaigns);
    }
    
    public function indexAdminPendingCampaign(Request $request){
        $pendingCampaigns = Campaign::whereStatus(0)->get();
        return view('campaign.campaigns')->with('campaigns', $pendingCampaigns);
    }
    
    public function indexAdminCancelledCampaign(Request $request){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $cancelledCampaigns = Campaign::whereStatus(2)->get();
        return view('campaign.campaigns')->with('campaigns', $cancelledCampaigns);
    }
    
    public function indexAdminBlockedCampaign(Request $request){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $blockedCampaigns = Campaign::whereStatus(3)->get();
        return view('campaign.campaigns')->with('campaigns', $blockedCampaigns);
    }
    
    public function indexAdminDeclinedCampaign(Request $request){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $declinedCampaigns = Campaign::whereStatus(4)->get();
        return view('campaign.campaigns')->with('campaigns', $declinedCampaigns);
    }
    
    
    public function indexAdminCampaign($category='pending'){
        return view('campaign.campaigns')->with('category', $category);
    }
    /*
     * admin activities ends
     */
    
    
    
    
    
    /**
     * seller can create a product
     */
    public function create(Request $request) {
        $title = 'Create New Campaign';
        // fields are empty menas profile is complete. so no action needed.
        // but if are not empty means, those fields are not filled up. so 
        // redirect user to profile-edit page. and accociate a link to
        // campaign-create page as origUrl so that after completing the profile
        // user could go to campaign-create page.
        $fields = Auth::user()->isProfileComplete();
        $message = 'You didn\'t comple your profile.' .$fields. ' are not filled. To create any campaign you have to fillup those fields.';
        if($fields){
            return view('campaign.incomplete-profile-msg', compact('message'));
        }
        
        // actual campaign creation process.
        $countries = Country::all();
        $categories = Category::all();
        return view('campaign.campaign-create', compact('countries', 'categories', 'request', 'title'));
    }
    
    public function preview(Request $request) {
        $previewedId = session('previewedId');
        if($previewedId) $this->destroy ($previewedId);
        $this->store($request, true);
    }
    
    public function store(Request $request, $preview=false) {
        // $previewedId = session('previewedId');
        // if($previewedId) $this->destroy ($previewedId);
        
        $rules = [
            'title' => 'required|string:255',
            'category' => 'required|numeric',
            'short_description' => 'required|string:400',
            'description' => 'required|string',
            'feature_image' => 'required|file',
            'album' => 'array',
            'documents' => 'required|array',
            // 'feature_video' => 'required|file',
            'goal' => 'required|numeric',
            'end_method' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'min_amount' => 'numeric',
            'max_amount' => 'numeric',
            'recommended_amount' => 'numeric',
            'amount_prefilled' => 'string:255',
        ];
        $this->validate($request, $rules);

        $user_id = Auth::user()->id;
        $slug = Helper::unique_slug($request->title);
        
        if($preview) $status = -1;
        else $status = 0;
        $data = [
            'user_id' => $user_id,
            'category_id' => $request->category,
            
            'slug' => $slug,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'feature_image' => $this->storeImage($request),
            // 'feature_video' => $request->video,
            
            'goal' => $request->goal,
            // 0:ends-by-date, 1:ends-by-goal
            'end_method' => $request->end_method,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,
            'recommended_amount' => $request->recommended_amount,
            'amount_prefilled' => $request->amount_prefilled,
            
            'status' => $status,
            'is_funded' => 0,
        ];
        $create = Campaign::create($data);
        // if any image for supplimenting feature image to this campaign
        // those are uploaded by this method
        if ($request->hasFile('album')) {
            $this->updateAlbum($request, $create);
        }
        // if any image, pdf for supporting documents of this campaign
        // those are uploaded by this method
        if ($request->hasFile('documents')) {
            $this->updateDocuments($request, $create);
        }

        if ($create) {
            // if($preview) session (['previewedId' => $created->id]);
            return redirect(route('campaign.showGuestCampaign', $create->id));
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());
    }
    
    /*
     * this portion is actually a part of this->store() method. but is separated from that
     * to facilate the use use of preview() so that we can avoid dry provess. (not used)
     */
    private function storeOnly($request) {
        $rules = [
            'title' => 'required|string:255',
            'category' => 'required|numeric',
            'short_description' => 'required|string:400',
            'description' => 'required|string',
            'feature_image' => 'required|file',
            'album' => 'array',
            'documents' => 'required|array',
            // 'feature_video' => 'required|file',
            'goal' => 'required|numeric',
            'end_method' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'min_amount' => 'numeric',
            'max_amount' => 'numeric',
            'recommended_amount' => 'numeric',
            'amount_prefilled' => 'string:255',
        ];
        $this->validate($request, $rules);

        $user_id = Auth::user()->id;
        $slug = Helper::unique_slug($request->title);
        
        $data = [
            'user_id' => $user_id,
            'category_id' => $request->category,
            
            'slug' => $slug,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'feature_image' => $this->storeImage($request),
            // 'feature_video' => $request->video,
            
            'goal' => $request->goal,
            // 0:ends-by-date, 1:ends-by-goal
            'end_method' => $request->end_method,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'min_amount' => $request->min_amount,
            'max_amount' => $request->max_amount,
            'recommended_amount' => $request->recommended_amount,
            'amount_prefilled' => $request->amount_prefilled,
            
            'status' => 0,
            'is_funded' => 0,
        ];
        $create = Campaign::create($data);
        // if any image for supplimenting feature image to this campaign
        // those are uploaded by this method
        if ($request->hasFile('album')) {
            $this->updateAlbum($request, $create);
        }
        // if any image, pdf for supporting documents of this campaign
        // those are uploaded by this method
        if ($request->hasFile('documents')) {
            $this->updateDocuments($request, $create);
        }
        
        return $create;
    }


    private function storeImage($request) {
        if(!$request->hasFile('feature_image')){
            return '';
        }
        $image = $request->file('feature_image');
        $image_base_name = str_replace('.' . $image->getClientOriginalExtension(), '', $image->getClientOriginalName());
        $image_name = strtolower(time().Str::random(5).'-'.Str::slug($image_base_name)).'.' . $image->getClientOriginalExtension();
        
        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $featureImagePath = 'uploads/campaign/full/';
        $featureImageFullPath = $publicPath.'/'.$featureImagePath;
        $imagePublicPath = $featureImagePath.$image_name;
        $dbPath = '/'.$imagePublicPath;
        
        if (!file_exists($featureImageFullPath)) {
            mkdir($featureImageFullPath, 0777, true);
        }
        
        $resized = Image::make($image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        
        try {
            $resized->save($imagePublicPath);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $this->proccessThumbnail($image, $image_name);
        
        return $dbPath;
    }

    


    
    
    
    
    
    
    
    
    public function edit(Request $request, $campaignId) {
        $campaign = Campaign::find($campaignId);
        $countries = Country::all();
        $categories = Category::all();
        return view('campaign.campaign-edit')->with(compact('request', 'campaign', 'countries', 'categories'));
    }
    
    public function update(Request $request, $campaignId) {
        $rules = [
            'title' => 'string',
            'category' => 'numeric',
            'short_description' => 'string',
            'description' => 'string',
            'feature_image' => 'file',
            'album' => 'array',
            'documents' => 'array',
            // 'feature_video' => 'required|file',
            'goal' => 'numeric',
            'end_method' => 'numeric',
            'start_date' => 'date',
            'end_date' => 'date',
            'min_amount' => 'numeric',
            'max_amount' => 'numeric',
            'recommended_amount' => 'numeric',
            'amount_prefilled' => 'string',
        ];
        $this->validate($request, $rules);
        
        $campaign = Campaign::find($campaignId);
        
        $slug = Helper::unique_slug($request->title);
        
        $campaign->category_id = $request->category;
        // $campaign->country_id = $request->country_id;
        
        $campaign->title = $request->title;
        $campaign->slug = $slug;
        $campaign->short_description = $request->short_description;
        $campaign->description = $request->description;
        $campaign->feature_image = $this->updateImage($request, $campaign);
        $campaign->feature_video = $request->video;

        $campaign->goal = $request->goal;
        $campaign->end_method = $request->end_method;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->min_amount = $request->min_amount;
        $campaign->max_amount = $request->max_amount;
        $campaign->recommended_amount = $request->recommended_amount;
        $campaign->amount_prefilled = $request->amount_prefilled;

        $campaign->status = 0;
        $campaign->is_funded = 0;
        
        $updated = $campaign->update();
        // if any image for supplimenting feature image to this campaign
        // those are uploaded by this method
        if ($request->hasFile('album')) {
            $this->updateAlbum($request, $campaign);
        }
        // if any image, pdf for supporting documents of this campaign
        // those are uploaded by this method
        if ($request->hasFile('documents')) {
            $this->updateDocuments($request, $campaign);
        }
        
        if ($updated) {
            $req = [
                'adminCampaignMenu' => $request->adminCampaignMenu,
            ];
            return redirect(route('campaign.showGuestCampaign', $campaignId))->with(['success' => trans('app.campaign_created'), 'request' => $req]);
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());
    }
    
    private function updateImage($request, $campaign) {
        if(!$request->hasFile('feature_image')){
            return $campaign->feature_image;
        }
        $image = $request->file('feature_image');
        $image_base_name = str_replace('.' . $image->getClientOriginalExtension(), '', $image->getClientOriginalName());
        $image_name = strtolower(time().Str::random(5).'-'.Str::slug($image_base_name)).'.' . $image->getClientOriginalExtension();
        
        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $featureImagePath = 'uploads/campaign/full/';
        $featureImageFullPath = $publicPath.'/'.$featureImagePath;
        $imagePublicPath = $featureImagePath.$image_name;
        $dbPath = '/'.$imagePublicPath;
        
        if (!file_exists($featureImageFullPath)) {
            mkdir($featureImageFullPath, 0777, true);
        }
        
        $resized = Image::make($image)->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        
        $previous_photo = $campaign->feature_image;
        $previous_thumb_photo = str_replace('full', 'thumb', $campaign->feature_image);
        try {
            $resized->save($imagePublicPath);
            if ($previous_photo && file_exists($publicPath.$previous_photo)) {
                unlink($publicPath.$previous_photo);
                unlink($publicPath.$previous_thumb_photo);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        $this->proccessThumbnail($image, $image_name);
        
        return $dbPath;
    }
    
    
    private function updateDocuments($request, $campaign) {
        foreach ($request->file('documents') as $aFile) {
            $this->updateDocument($aFile, $campaign);
        }
    }
    
    private function updateDocument($aFile, $campaign) {
        // file name = 'saif.jpg' here base name is 'saif'
        $image_base_name = str_replace('.' . $aFile->getClientOriginalExtension(), '', $aFile->getClientOriginalName());
        // new image name is built
        $image_name = strtolower(time() . Str::random(5) . '-' . Str::slug($image_base_name)) . '.' . $aFile->getClientOriginalExtension();

        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $featureImagePath = 'uploads/documents/';
        $featureImageFullPath = $publicPath . '/' . $featureImagePath;
        $imagePublicPath = $featureImagePath . $image_name;
        $dbPath = '/' . $imagePublicPath;

        if (!file_exists($featureImageFullPath)) {
            mkdir($featureImageFullPath, 0777, true);
        }

        $resized = Image::make($aFile)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        try {
            $resized->save($imagePublicPath);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        $data = [
            'campaign_id' => $campaign->id,
            'image_path' => $dbPath,
        ];
        $created = Document::create($data);
    }
    
    private function updateAlbum($request, $campaign) {
        foreach ($request->file('album') as $aFile) {
            $this->updateAlbumImage($aFile, $campaign);
        }
    }
    
    private function updateAlbumImage($aFile, $campaign) {
        // file name = 'saif.jpg' here base name is 'saif'
        $image_base_name = str_replace('.' . $aFile->getClientOriginalExtension(), '', $aFile->getClientOriginalName());
        // new image name is built
        $image_name = strtolower(time() . Str::random(5) . '-' . Str::slug($image_base_name)) . '.' . $aFile->getClientOriginalExtension();

        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $featureImagePath = 'uploads/campaign/full/';
        $featureImageFullPath = $publicPath . '/' . $featureImagePath;
        $imagePublicPath = $featureImagePath . $image_name;
        $dbPath = '/' . $imagePublicPath;

        if (!file_exists($featureImageFullPath)) {
            mkdir($featureImageFullPath, 0777, true);
        }

        $resized = Image::make($aFile)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        try {
            $resized->save($imagePublicPath);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        $this->proccessThumbnail($aFile, $image_name);
        
        $data = [
            'campaign_id' => $campaign->id,
            'image_path' => $dbPath,
        ];
        $created = Album::create($data);
    }
    
    private function proccessThumbnail($aFile, $image_name){
        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $featureThumbImagePath = 'uploads/campaign/thumb/';
        $featureThumbImageFullPath = $publicPath . '/' . $featureThumbImagePath;
        $thumbImagePublicPath = $featureThumbImagePath . $image_name;

        if (!file_exists($featureThumbImageFullPath)) {
            mkdir($featureThumbImageFullPath, 0777, true);
        }

        $resized = Image::make($aFile)->resize(20, 20, function ($constraint) {
            // $constraint->aspectRatio();
        });

        try {
            $resized->save($thumbImagePublicPath);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function updateStatusToApproved($id) {
        $campaign = Campaign::find($id);
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaign->status = 1;
        $updated = $campaign->update();
        if($updated){
            return back()->with(['success' => 'The campaign has been approved', 'campaing' => $campaign]);
        }
        return back()->with(['error' => 'The action couldn\'t be performed', 'campaing' => $campaign]);
    }
    
    public function updateStatusToCancel($id) {
        $campaign = Campaign::find($id);
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaign->status = 2;
        $updated = $campaign->update();
        if($updated){
            return back()->with(['success' => 'The campaign has been approved', 'campaing' => $campaign]);
        }
        return back()->with(['error' => 'The action couldn\'t be performed', 'campaing' => $campaign]);
    }
    
    public function updateStatusToBlock($id) {
        $campaign = Campaign::find($id);
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaign->status = 3;
        $updated = $campaign->update();
        if($updated){
            return back()->with(['success' => 'The campaign has been approved', 'campaing' => $campaign]);
        }
        return back()->with(['error' => 'The action couldn\'t be performed', 'campaing' => $campaign]);
    }
    
    public function updateStatusToDeclined($id) {
        $campaign = Campaign::find($id);
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaign->status = 4;
        $updated = $campaign->update();
        if($updated){
            return back()->with(['success' => 'The campaign has been approved', 'campaing' => $campaign]);
        }
        return back()->with(['error' => 'The action couldn\'t be performed', 'campaing' => $campaign]);
    }
    
    
    
    /**
     * only admin can destroy a product but not seller
     */
    public function destroy($id) {
        // a campaign may have these resources to delete:
        // 1. database record
        // 2. feature image
        // 3. feature video
        // 4. album photos
        // 5. document photos
        // 6. update photos
        $campaign = Campaign::find($id);
        $featureImage = $campaign->feature_image;
        $albumPhotos = Album::where('campaign_id', $id)->get();
        $documentPhotos = Document::where('campaign_id', $id)->get();
        $updatePhotos = Update::where('campaign_id', $id)->get();
        
        // deletes feature image
        if($featureImage) {
            // replaces the word 'full' with 'thumb'
            $featureThumbImage = str_replace('full', 'thumb', $featureImage);
            $this->deleteImage($featureImage, $featureThumbImage);
            $campaign->delete();
        }
        
        if($albumPhotos) {
            foreach ($albumPhotos as $anImage) {
                $albumThumbImage = str_replace('full', 'thumb', $anImage->image_path);
                $this->deleteImage($anImage->image_path, $albumThumbImage);
                $anImage->delete();
            }
        }
        
        if($documentPhotos) {
            foreach ($documentPhotos as $anImage) {
                $this->deleteImage($anImage->image_path);
                $anImage->delete();
            }
        }
        
        if($updatePhotos) {
            foreach ($updatePhotos as $anImage) {
                $this->deleteImage($anImage->image_path);
                $anImage->delete();
            }
        }
        return redirect(session('adminCampaignsUrl'));
    }
    
    /*
     * deletes an image and it's thumb image
     */
    public function deleteImage($image, $thumbImage='') {
        try {
            if (file_exists(public_path().$image)) {
                unlink(public_path().$image);
            }
            
            if (file_exists(public_path().$thumbImage)) {
                unlink(public_path().$thumbImage);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    

}
