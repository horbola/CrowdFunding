<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Library\Helper;
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
use App\Models\UserExtra;

use App\Mail\CampaignCreation;



class CampaignController extends Controller {
    
    public function searchGuestCampaign() {
        $rules = ['q' => 'string:500', 'searching' => 'integer:1'];
        $validated = request()->validate($rules);
        return $campaigns = Campaign::where('title', 'like', "%{$validated['q']}%")->
            orWhere('slug', 'like', "%{$validated['q']}%")->
            orWhere('short_description', 'like', "%{$validated['q']}%")->
            orWhere('description', 'like', "%{$validated['q']}%")->paginate(15)->withQueryString();
    }
    
    public function indexFilteredCampaign() {}
    
    public function indexGuestCampaign(Request $request){
        $categories = Category::all();
        $categoryId = $request->categoryId ? $request->categoryId : 0;
        $active = $categoryId;
        
        $campaigns = Campaign::where('category_id', $categoryId)->paginate(15);
        if(request()->searching){
            $campaigns = $this->searchGuestCampaign();
        }
        
        $campsCollect = $campaigns->getCollection()->filter(function($aCamp) {
            return $aCamp->isActive();
        });
        $campaigns->setCollection($campsCollect);

        return view('face.camp-master', compact('categories', 'active', 'campaigns'));
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
            if (Auth::check() && (Auth::user()->id !== $campaign->user_id && !$campaign->isCampPending())) {
                $data = [
                    'user_id' => Auth::user()->id,
                    'campaign_id' => $campaign->id,
                ];
                View::create($data);
            }
            
            return view('face.camp-offerus', compact('campaign'));
        }
        else {
            return view('face.camp-not-found');
        }
    }
    
    /*
     * donor activities starts
     */
    public function indexDonatedCampaign(){
        $title = 'Donated Campaign';
        $menuName = 'donated-camp';
        if(Auth::check()){
            $userId = Auth::user()->id;
            $donations = Donation::where('user_id', $userId)->paginate(15);
            // just converting donation to campaign
            $camps = $donations->getCollection()->map(function($donation) {
                        return $donation->campaign;
                        // taking only one occurance of each campaign elininating
                        // the duplicate occurance but counting the occurance number
                    })->groupBy('id')->map(function ($aGroup) {
                        // as we need only one of each group. this map iterates once
                        // for each group
                        $first = $aGroup[0];
                        $first->count = $aGroup->count();
                        return $first;
            });
            $campaigns = $donations->setCollection($camps);
            return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexSupportedCampaign(){
        $title = 'Supported Campaign';
        $menuName = 'supported-camp';
        if(Auth::check()){
            $likes = Like::where('user_id', Auth::user()->id)->paginate(15);
            $camps = $likes->getCollection()->map(function($like, $key){
                return $like->campaign;
            });
            $campaigns = $likes->setCollection($camps);
            return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexSharedCampaign(){
        $title = 'Shared Campaign';
        $menuName = 'shareed-camp';
        if(Auth::check()){
            $shares = Share::where('user_id', Auth::user()->id)->paginate(5);
            $camps = $shares->getCollection()->map(function($share, $key){
                return $share->campaign;
            });
            $campaigns = $shares->setCollection($camps);
            return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexCommentedCampaign(){
        $title = 'Commented Campaign';
        $menuName = 'commented-camp';
        if(Auth::check()){
            $comments = Comment::where('user_id', Auth::user()->id)->distinct()->paginate(15, ['campaign_id']);
            $campsCollect = $comments->getCollection()->map(function($comment, $key){
                return $comment->campaign;
            });
            $campaigns = $comments->setCollection($campsCollect);
            return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    // views is counted by when user clicks on a tile to see it's detail.
    public function indexViewedCampaign(){
        $title = 'Viewed Campaign';
        $menuName = 'viewed-camp';
        if(Auth::check()){
            $views = View::where('user_id', Auth::user()->id)->paginate(15);
            // just converting views to campaign
            $campsCollect = $views->getCollection()->map(function($view, $key) {
                    return $view->campaign;
                // taking only one occurance of each campaign elininating
                // the duplicate occurance but counting the occurance number
                })->groupBy('id')->map(function ($aGroup) {
                    // as we need only one of each group. this map iterates once
                    // for each group
                    $first = $aGroup[0];
                    $first->count = $aGroup->count();
                    return $first;
                // rejects the campaigns which are create by the campaigner himself
                })->reject(function ($value) {
                    if ((Auth::user()->id === $value->user_id) || $value->isCampPending()) {
                        return true;
                    }
            });
            $campaigns = $views->setCollection($campsCollect);
            return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
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
        $title = 'My Campaigns Panel';
        $menuName = 'myc-camp';
        return view('campaign.campaigns-panel-mine', compact('title', 'menuName'));
    }
    
    public function searchMyCampaign($status) {
        $rules = ['q' => 'string:500', 'searching' => 'integer:1'];
        $validated = request()->validate($rules);
        if( isset($status) ){
            return $campaigns = Campaign::where(function($query) use ($validated) {
                $query->where('title', 'like', "%{$validated['q']}%")->
                orWhere('slug', 'like', "%{$validated['q']}%")->
                orWhere('short_description', 'like', "%{$validated['q']}%")->
                orWhere('description', 'like', "%{$validated['q']}%");
            })->where('user_id', Auth::user()->id)->
            where('status', $status)->paginate(15)->withQueryString();
        }
        else {
            return $campaigns = Campaign::where(function($query) use ($validated) {
                $query->where('title', 'like', "%{$validated['q']}%")->
                orWhere('slug', 'like', "%{$validated['q']}%")->
                orWhere('short_description', 'like', "%{$validated['q']}%")->
                orWhere('description', 'like', "%{$validated['q']}%");
            })->where('user_id', Auth::user()->id)->paginate(15)->withQueryString();
        }
    }
    
    public function indexMyAllCampaign(){
        $title = 'All Campaigns';
        $menuName = 'my-camp';
        if(Auth::check()){
            $title = 'My All Campaign';
            $menuName = 'my-camp';
            $campaigns = Campaign::where('user_id', Auth::user()->id)->paginate(15);
            if (request()->searching) {
                $title = 'Searching All Campaigns';
                $campaigns = $this->searchMyCampaign(null);
            }
            
            return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyActiveCampaign(){
        $title = 'Active Campaigns';
        $menuName = 'my-camp';
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->paginate(15);
            if (request()->searching) {
                $title = 'Searching Active Campaigns';
                $campaigns = $this->searchMyCampaign(null);
            }
            
            $campsCollect = $campaigns->getCollection()->filter(function($value, $key){
                return $value->isActive();
            });
            $campaigns->setCollection($campsCollect);
            return view('campaign.campaigns-list', compact('user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyCompletedCampaign(){
        $title = 'Completed Campaign';
        $menuName = 'my-camp';
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->paginate(15);
            if (request()->searching) {
                $title = 'Searching Completed Campaigns';
                $campaigns = $this->searchMyCampaign(null);
            }
            
            $campsCollect = $campaigns->getCollection()->filter(function($value, $key){
                return $value->isCompleted();
            });
            $campaigns->setCollection($campsCollect);
            
            return view('campaign.campaigns-list', compact('user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyPendingCampaign(){
        $title = 'Pending Campaingn';
        $menuName = 'my-camp';
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 0)->paginate(15);
            if (request()->searching) {
                $title = 'Searching Pending Campaigns';
                $campaigns = $this->searchMyCampaign(0);
            }
            
            return view('campaign.campaigns-list', compact('user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyCancelledCampaign(){
        $title = 'Cancelled Campaign';
        $menuName = 'my-camp';
        if(Auth::check()){
            $user = Auth::user();
            // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 2)->paginate(15);
            if (request()->searching) {
                $title = 'Searching Cancelled Campaigns';
                $campaigns = $this->searchMyCampaign(2);
            }
            
            return view('campaign.campaigns-list', compact('user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyBlockedCampaign(){
        $title = 'Blocked Campaign';
        $menuName = 'my-camp';
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 3)->paginate(15);
            if (request()->searching) {
                $title = 'Searching Blocked Campaigns';
                $campaigns = $this->searchMyCampaign(3);
            }
            
            return view('campaign.campaigns-list', compact('user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyDeclinedCampaign(){
        $title = 'Declined Campaign';
        $menuName = 'my-camp';
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 4)->paginate(15);
            if (request()->searching) {
                $title = 'Searching Declined Campaigns';
                $campaigns = $this->searchMyCampaign(4);
            }
            
            return view('campaign.campaigns-list', compact('user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    /*
     * campaigner activities ends
     */
    
    
    
    // select all form table campaign where id is (select id from table userExtra where phone is 0187) 
    
    // Campaign::find();
    
    
    

    /*
     * admin activities starts
     */
    public function indexAdminCampaignPanel(){
        $title = 'Campaign Information';
        $menuName = 'campaign';
        return view('campaign.campaigns-panel-admin', compact('title', 'menuName'));
    }
    
    public function adminCampaignSearchByTitle($status=false){
        $rules = ['q' => 'string:500', 'searching' => 'integer:1'];
        $validated = request()->validate($rules);
        if( isset($status) ){
            return $campaigns = Campaign::where(function($query) use ($validated) {
                $query->where('title', 'like', "%{$validated['q']}%")->
                orWhere('slug', 'like', "%{$validated['q']}%")->
                orWhere('short_description', 'like', "%{$validated['q']}%")->
                orWhere('description', 'like', "%{$validated['q']}%");
            })->where('status', $status)->paginate(15)->withQueryString();
        }
        else {
            return $campaigns = Campaign::where(function($query) use ($validated) {
                $query->where('title', 'like', "%{$validated['q']}%")->
                orWhere('slug', 'like', "%{$validated['q']}%")->
                orWhere('short_description', 'like', "%{$validated['q']}%")->
                orWhere('description', 'like', "%{$validated['q']}%");
            })->paginate(15)->withQueryString();
        }
    }
    
    public function adminCampaignSearch($status=null){
        $rules = ['q' => 'string:500', 'searching' => 'integer:1'];
        $validated = request()->validate($rules);

        /*
        $campaigns = Campaign::join('user_extras', function($builder){
            $builder->on('campaigns.user_id', '=', 'user_extras.user_id');
        })->where('phone', 'like', '01873334000%')->get();
        */


        /*
        $campaigns = DB::table('campaigns')
                ->join('user_extras', function ($join) {
                    $join->on('campaigns.user_id', '=', 'user_extras.user_id')
                    ->where('phone', 'like', '01873334000%');
                })
                ->get();
        */

        if( is_numeric($validated['q']) ){
            $c = new Collection();
            $userExtra = UserExtra::where('phone', 'like', "%{$validated['q']}%")->paginate(5)->withQueryString();
            if ($userExtra->getCollection()->count()) {
                foreach ($userExtra->getCollection() as $ue) {
                    $camps = null;
                    if( isset($status) )
                        $camps = Campaign::where('user_id', $ue->user_id)->whereStatus($status)->get();
                    else
                        $camps = Campaign::where('user_id', $ue->user_id)->get();
                    $c = $c->merge($camps);
                }
            }
            return $campaigns = $userExtra->setCollection($c);
        }
        else {
            return $this->adminCampaignSearchByTitle($status);
        }
    }
    
    public function indexAdminAllCampaign(){
        $title = 'All Campaign';
        $menuName = 'campaign';
        $campaigns = Campaign::paginate(15);
        if (request()->searching) {
            $title = 'Searching All Campaigns';
            $campaigns = $this->adminCampaignSearch(null);
        }
        return view('campaign.campaigns', compact('campaigns', 'title', 'menuName'));
    }

    public function indexAdminActiveCampaign(){
        $title = 'Active Campaign';
        $menuName = 'campaign';
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaigns = Campaign::whereStatus(1)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Active Campaigns';
            $campaigns = $this->adminCampaignSearch(1);
        }
        
        $campsCollect = $campaigns->getCollection()->filter(function ($value, $key) {
            return $value->isActive();
        });
        $campaigns->setCollection($campsCollect);
        
        return view('campaign.campaigns', compact('campaigns', 'title', 'menuName'));
    }
    
    public function indexAdminCompletedCampaign(){
        $title = 'Completed Campaign';
        $menuName = 'campaign';
        $campaigns = Campaign::whereStatus(1)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Completed Campaigns';
            $campaigns = $this->adminCampaignSearch(1);
        }
        
        $campsCollect = $campaigns->getCollection()->filter(function ($value, $key) {
            return $value->isCompleted();
        });
        $campaigns->setCollection($campsCollect);
        
        return view('campaign.campaigns', compact('title', 'menuName', 'campaigns'));
    }
    
    public function indexAdminPendingCampaign(){
        $title = 'Pending Campaingn';
        $menuName = 'campaign';
        $campaigns = Campaign::whereStatus(0)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Pending Campaigns';
            $campaigns = $this->adminCampaignSearch(0);
        }
        
        return view('campaign.campaigns', compact('campaigns', 'title', 'menuName'));
    }
    
    public function indexAdminCancelledCampaign(){
        $title = 'Cancelled Campaign';
        $menuName = 'campaign';
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaigns = Campaign::whereStatus(2)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Canceled Campaigns';
            $campaigns = $this->adminCampaignSearch(2);
        }
        
        return view('campaign.campaigns', compact('title', 'menuName', 'campaigns'));
    }
    
    public function indexAdminBlockedCampaign(){
        $title = 'Blocked Campaign';
        $menuName = 'campaign';
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaigns = Campaign::whereStatus(3)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Blocked Campaigns';
            $campaigns = $this->adminCampaignSearch(3);
        }
        
        return view('campaign.campaigns', compact('title', 'menuName', 'campaigns'));
    }
    
    public function indexAdminDeclinedCampaign(){
        $title = 'Declined Campaign';
        $menuName = 'campaign';
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaigns = Campaign::whereStatus(4)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Canceled Campaigns';
            $campaigns = $this->adminCampaignSearch(4);
        }
        
        return view('campaign.campaigns', compact('title', 'menuName', 'campaigns'));
    }
    
    public function indexAdminPickedCampaign(){
        $title = 'Picked Campaign';
        $menuName = 'campaign';
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaigns = Campaign::whereIsPicked(true)->paginate(15);
        if (request()->searching) {
            $title = 'Searching Picked Campaigns';
            $campaigns = $this->adminCampaignSearch(4);
        }
        
        $coll = $campaigns->getCollection()->filter(function($camp){
            return $camp->is_picked;
        });
        $campaigns->setCollection($coll);
        $option = 'picked';
        return view('campaign.campaigns', compact('title', 'menuName', 'campaigns', 'option'));
    }
    /*
     * admin activities ends
     */
    
    
    
    
    
    /**
     * seller can create a product
     */
    public function create(Request $request) {
        $title = 'Create New Campaign';
        $menuName = 'create-camp';
        
        // check first whether a user has completed her profile
        $fields = Auth::user()->isProfileComplete();
        $message = 'You didn\'t comple your profile.' .$fields. ' are not filled. To create any campaign you have to fillup those fields.';
        if($fields){
            $title = 'Incomplete Profile';
            $request->request->add(['origUrl' => route('campaign.create')]);
            return view('campaign.incomplete-profile-msg', compact('message', 'title', 'menuName'));
        }
        
        // actual campaign creation process.
        $countries = Country::all();
        $categories = Category::all();
        return view('campaign.campaign-create', compact('countries', 'categories', 'request', 'title', 'menuName'));
    }
    
    public function preview(Request $request) {
        $previewedId = session('previewedId');
        if($previewedId) $this->destroy ($previewedId);
        $this->store($request, true);
    }
    
    public function store(Request $request, $preview=false) {
        // $previewedId = session('previewedId');
        // if($previewedId) $this->destroy ($previewedId);
        
        $isAnyCampPending = Auth::user()->campaign->contains(function($camp){
            return $camp->isCampPending();
        });
        if($isAnyCampPending)
            return back()->with('error', 'Sorry! you cannot create another campaign while you have a campaign already pending.');
        
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
        $title = 'Edit Campaign';
        $menuName = $request->menuName? $request->menuName : 'my-camp';
        $campaign = Campaign::find($campaignId);
        $countries = Country::all();
        $categories = Category::all();
        return view('campaign.campaign-edit', compact('campaign', 'countries', 'categories', 'title', 'menuName'));
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
//            session(['approving' => 'true']);
//            $request->request->add(['editing' => 'yes']);
            return redirect(route('campaign.showGuestCampaign', ['campaignId' => $campaignId, 'editing' => 'true']));
//            return redirect()->back()->with(['success' => trans('app.campaign_created'), 'editing' => 'yes']);
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

    /*
     * approves a campaign
     */
    public function updateStatusToApproved($id) {
        $campaign = Campaign::find($id);
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaign->status = 1;
        $updated = $campaign->update();
        if($updated){
            $campaign->refresh();
            Mail::to($campaign->campaigner)->send(new CampaignCreation($campaign));
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
            Mail::to($campaign->campaigner)->send(new CampaignCreation($campaign));
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
            Mail::to($campaign->campaigner)->send(new CampaignCreation($campaign));
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
            return back()->with(['success' => 'The campaign has been approved', 'campaign' => $campaign]);
        }
        return back()->with(['error' => 'The action couldn\'t be performed', 'campaign' => $campaign]);
    }
    
    public function updatePickedCampaign($id){
//        dd('id is : '.$id);
        $camp = Campaign::find($id);
        if($camp->is_picked)
            $camp->is_picked = false;
        else $camp->is_picked = true;
        $camp->save();
        
        return redirect()->back();
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
        // 7. like
        // 8. view
        // 9. comment
        // 10. share
        // 11. investigation
        // to-do: decide whether everything relating to a campaign should be deleted
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
