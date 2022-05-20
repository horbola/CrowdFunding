<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        $title = 'Oporajoy (Campaign List)';
        
        if($categoryId){
            $title = $title . ' - ' . Category::find($categoryId)->category_name;
        }
        
        $campaigns = Campaign::where('category_id', $categoryId)->paginate(15);
        if(request()->searching){
            $campaigns = $this->searchGuestCampaign();
        }
        
        $campsCollect = $campaigns->getCollection()->filter(function($aCamp) {
            return $aCamp->isActive();
        });
        $campaigns->setCollection($campsCollect);

        return view('face.camp-master', compact('categories', 'active', 'campaigns', 'title'));
    }
    
   
    /*
     * shows a campaign on the basis of it's id which is provided by the master page.
     * it records each show before showing.
     */
    public function showGuestCampaign($campaignSlug){
        session(['adminCampaignsUrl' => URL::previous()]);
        $campaign = Campaign::where('slug', $campaignSlug)->first();
        if($campaign && $this->authorizeShowing($campaign)){
            // every show of any campaign is recoreded by this portion.
            // but recorded only if the visitor is logged in and not campaign creator himself.
            if (Auth::check() && (Auth::user()->id !== $campaign->user_id && !$campaign->isCampPending())) {
                $data = [
                    'user_id' => Auth::user()->id,
                    'campaign_id' => $campaign->id,
                ];
                View::create($data);
            }
            
            $title = 'Oporajoy - ' . $campaign->title;
            return view('face.camp-offerus', compact('campaign', 'title'));
        }
        else {
            return view('face.camp-not-found');
        }
    }
    
    private function authorizeShowing($camp){
        // anyone can see active campaign
        $showToGuest = $camp->isActive();
        // campaigner can see his own campaign in any status
        $showToCampr = Auth::check() && (Auth::user()->id === $camp->user_id);
        // investigator can see only pending campaign
        $showToInv = Auth::check() && ((int)Auth::user()->is_volunteer === 2) && $camp->isCampPending();
        // admin can see any campaign
        $showToAdmin = Auth::check() && ((int)Auth::user()->is_admin === 1);
        return $showToGuest || $showToCampr || $showToInv || $showToAdmin;
    }
    
    private function authorizeShowingV2($camp){
        $isAdmin = Auth::check() && ((int)Auth::user()->isAdmin === 1);
        $isInv = Auth::check() && ((int)Auth::user()->isVolunteer === 1);
        $isCampr = Auth::check() && (Auth::user()->id === $campaign->user_id);
        if($camp->isActive() || $isAdmin){
            return true;
        }
        else if( $camp->isCampPending() || $isInv){
            return true;
        }
        else if($isCampr){
            return true;
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
        
        $this->validate($request, $this->createCampValidn(), $this->createCampValidnMsg());

        $user_id = Auth::user()->id;
        $slug = Helper::unique_slug($request->title);
        
        if($preview) $status = -1;
        else $status = 0;
        
        $create = Campaign::create( $this->createCampData($request, $user_id, $slug, $status) );
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
            return redirect(route('campaign.showGuestCampaign', $create->slug));
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
        
        $resized = Image::make($image)->resize(730, null, function ($constraint) {
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
        $this->validate($request, $this->updateCampValidn(), $this->updateCampValidnMsg());

        $campaign = Campaign::find($campaignId);
        $slug = Helper::unique_slug($request->title);
         
        $this->updateCampData($request, $campaign, $slug);
        
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
            return redirect(route('campaign.showGuestCampaign', ['campaignSlug' => $campaign->slug, 'editing' => 'true']));
//            return redirect()->back()->with(['success' => trans('app.campaign_created'), 'editing' => 'yes']);
        }
        return back()->with('error', trans('app.something_went_wrong'))->withInput($request->input());
    }
    
    public function updateDes(Request $request, $campId) {
        $camp = Campaign::find($campId);
        if($request->description){
            $camp->description = $request->description;
            $camp->update();
        }
        return $camp->description;
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
            Mail::to($campaign->campaigner)->send(new CampaignCreation($campaign, $campaign->campaigner));
            return back()->with(['success' => 'The campaign has been approved', 'campaing' => $campaign]);
        }
        return back()->with(['error' => 'The action couldn\'t be performed', 'campaing' => $campaign]);
    }
    
    // handles both admin and campaigner request
    public function updateStatusToCancel($id) {
        $campaign = Campaign::find($id);
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $campaign->status = 2;
        $updated = $campaign->update();
        if($updated){
            Mail::to($campaign->campaigner)->send(new CampaignCreation($campaign, $campaign->campaigner));
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
    
    // handles both admin and campaigner request
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
    
    private function escape($string) {
        $str = str_replace('\'', '\\\'', $string); // Replaces all spaces with backslash + single qoute.
        return $str;
//        return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
//        return preg_replace('[^A-Za-z0-9.#\-$]', '', $str);
    }
    
    
    // --------------- validation rules functions -----------------------------------
    private function createCampValidn() {
        return $rules = [
            'title' => 'required|string:255',
            'category' => 'required|numeric',
            'short_description' => 'required|string:500',
//            'description' => 'nullable|string:5000',
            'feature_image' => 'required|file',
//            'feature_image' => 'mimes:jpeg,jpg,png',
            'album' => 'array',
//            'album' => 'nullable|mimes:jpeg,jpg,png',
            'documents' => 'array',
//            'documents' => 'nullable|mimes:jpeg,jpg,png',
            // 'feature_video' => 'required|file',
            'goal' => 'required|numeric|min:10000|max:10000000',
            'end_method' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'min_amount' => 'nullable|numeric|min:2',
            'max_amount' => 'nullable|numeric|max:10000000',
            'recommended_amount' => 'nullable|numeric',
            'amount_prefilled' => 'nullable|string:255',
        ];
    }
    
    private function createCampValidnMsg() {
        return $msg = [
            'title.required' => 'You didn\'t provide this campaign with a title',
            'title.string' => 'The title should be in text. You may have put some invalid characters',
            'category.required' => 'You didn\'t select a category',
            'category.numeric' => 'You didn\'t select a category',
            'short_description.required' => 'You didn\'t provide this campaign with a short description. Don\'t leave it empty',
            'short_description.string' => 'Write this short description with text. Don\'t put any file or others in this',
            'feature_image.required' => 'You didn\'t set a feature image. Don\'t leave it empty',
            'goal.required' => 'You didn\'t set a goal. Don\'t leave it empty',
            'goal.numeric' => 'You can put just number in setting a goal.',
            'goal.min' => 'You can only define goal of minimum of 10,000 taka and maximum of one crore (10,000,000) taka',
            'goal.max' => 'You can only define goal of minimum of 1 taka and maximum of one crore (10,000,000) taka',
            'end_method.required' => 'You didn\'t decide what end method should be. Don\'t leave it empty',
            'end_method.numeric' => 'You did\'t select any end method.',
            'start_date.required' => 'You didn\'t set when this campaign will start. Please Select a date',
            'start_date.date' => 'The input you\ve entered isn\'t a date. Please Select a date',
            'end_date.required' => 'You didn\'t set when this campaign will end. Please Select a date',
            'end_date.date' => 'The input you\ve entered isn\'t a date. Please Select a date',
            'min_amount.numeric' => 'You can put just number in setting a minimum amount.',
            'min_amount.min' => 'You have to set minumum amount to at least 10 taka.',
            'max_amount.numeric' => 'You can put just number in setting a maximum amount.',
            'max_amount.max' => 'You have to set maximum amount to the your goal amount at most.',
            'recommended_amount.numeric' => 'You can put just number in setting recommended amount.',
            'amount_prefilled.string' => 'Write these numbers separating by commas.',
        ];
    }
    
    private function createCampData($request, $user_id, $slug, $status) {
        return $data = [
            'user_id' => $user_id,
            'category_id' => $request->category,
            
            'slug' => $slug,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => ($request->description == null || $request->description == '') ? '' : $request->description,
//            'description' => ($request->description == null || $request->description == '') ? 'There\'s no description yet. You can easily edit this campaign to add a nice description with some pretty images' : $request->description,
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
    }
    
    private function updateCampValidn() {
        return $rules = [
            'title' => 'string:255',
            'category' => 'numeric',
            'short_description' => 'string:500',
            'description' => 'string:5000',
            'feature_image' => 'file',
            'album' => 'array',
//            'album' => 'nullable|mimes:jpeg,jpg,png',
            'documents' => 'array',
//            'documents' => 'nullable|mimes:jpeg,jpg,png',
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
    }
    
    private function updateCampValidnMsg() {
        return $msg = [
            'title.required' => 'You didn\'t provide this campaign with a title',
            'title.string' => 'The title should be in text. You may have put some invalid characters',
            'category.required' => 'You didn\'t select a category',
            'category.numeric' => 'You didn\'t select a category',
            'short_description.required' => 'You didn\'t provide this campaign with a short description. Don\'t leave it empty',
            'short_description.string' => 'Write this short description with text. Don\'t put any file or others in this',
            'feature_image.required' => 'You didn\'t set a feature image. Don\'t leave it empty',
            'goal.required' => 'You didn\'t set a goal. Don\'t leave it empty',
            'goal.numeric' => 'You can put just number in setting a goal.',
            'end_method.required' => 'You didn\'t decide what end method should be. Don\'t leave it empty',
            'end_method.numeric' => 'You did\'t select any end method.',
            'start_date.required' => 'You didn\'t set when this campaign will start. Please Select a date',
            'start_date.date' => 'The input you\ve entered isn\'t a date. Please Select a date',
            'end_date.required' => 'You didn\'t set when this campaign will end. Please Select a date',
            'end_date.date' => 'The input you\ve entered isn\'t a date. Please Select a date',
            'min_amount.numeric' => 'You can put just number in setting a minimum amount.',
            'max_amount.numeric' => 'You can put just number in setting a maximum amount.',
            'recommended_amount.numeric' => 'You can put just number in setting recommended amount.',
            'amount_prefilled.string' => 'Write these numbers separating by commas.',
        ];
    }
    
    private function updateCampData($request, $campaign, $slug) {
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
    }
        

}
