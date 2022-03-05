<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

use App\Lib\Helper;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Like;
use App\Models\Share;
use App\Models\View;
use App\Models\Payment;

class CampaignController extends Controller {
    
    
    
    public function indexGuestCampaign($categoryId='1'){
        $categories = Category::all();
        $active = $categoryId;
        $campaigns = Campaign::where('category_id', $categoryId)->get();
        return view('campaign-list')->with(compact('categories', 'active', 'campaigns'));
    }
    
    public function showGuestCampaign($campaignId){
        $campaign = Campaign::find($campaignId);
        if(Auth::check() && (Auth::user()->id !== $campaign->user_id)){
            $data = [
                'user_id' => Auth::user()->id,
                'campaign_id' => $campaign->id,
            ];
            View::create($data);
        }
        
        return view('campaign-single', compact('campaign'));
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
    public function indexDonatedCampaign(){
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
            return view('dashboard.donor-camp', compact('campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexSupportedCampaign(){
        if(Auth::check()){
            $user = Auth::user();
            $likes = Like::where('user_id', $user->id)->get();
            $campaigns = $likes->map(function($like, $key){
                return $like->campaign;
            });
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexSharedCampaign(){
        if(Auth::check()){
            $user = Auth::user();
            $shares = Share::where('user_id', $user->id)->get();
            $campaigns = $shares->map(function($share, $key){
                return $share->campaign;
            });
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexCommentedCampaign(){
        
    }
    
    // views is counted by when user clicks on a tile to see it's detail.
    public function indexViewedCampaign(){
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
            return view('dashboard.donor-camp', compact('campaigns'));
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
        return view('dashboard.my-campaigns-panel');
    }
    
    public function indexMyAllCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->get();
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyActiveCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->get()->filter(function($value, $key){
                return $value->isActive();
            });
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyCompletedCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->get()->filter(function($value, $key){
                return $value->isCompleted();
            });
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyPendingCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 0)->get();
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyCancelledCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 2)->get();
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyBlockedCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 3)->get();
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    public function indexMyDeclinedCampaign() {
        if(Auth::check()){
            $user = Auth::user();
            $campaigns = Campaign::where('user_id', $user->id)->where('status', 4)->get();
            return view('dashboard.donor-camp', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    /*
     * campaigner activities ends
     */
    
    
    
    
    
    
    
    

    /*
     * admin activities starts
     */
    public function indexAdminCampaignPanel(){
        return view('admin.admin-campaign-panel');
    }
    
    public function indexAdminAllCampaign(){
        $allCampaigns = Campaign::paginate(15);
        return view('partial.admin.campaigns-content')->with('campaigns', $allCampaigns);
    }
    private function paginatorTest($allCampaigns){
//        dd($allCampaigns->count());
//        dd($allCampaigns->firstItem());
//        dd($allCampaigns->getOptions());
//        dd($allCampaigns->getUrlRange(0, 5));
//        dd($allCampaigns->hasPages());
//        dd($allCampaigns->hasMorePages());
//        dd($allCampaigns->items());
//        dd($allCampaigns->lastItem());
//        dd($allCampaigns->lastPage());
//        dd($allCampaigns->nextPageUrl());
//        dd($allCampaigns->onFirstPage());
//        dd($allCampaigns->perPage());
//        dd($allCampaigns->previousPageUrl());
//        dd($allCampaigns->total());
//        dd($allCampaigns->url());
//        dd($allCampaigns->getPageName());
//        dd($allCampaigns->setPageName());
    }


    public function indexAdminActiveCampaign(){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $activeCampaigns = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
            return $value->isActive();
        });
        
        return view('admin.campaigns')->with('campaigns', $activeCampaigns);
    }
    
    public function indexAdminCompletedCampaign(){
        $completedCampaigns = Campaign::whereStatus(1)->get()->filter(function ($value, $key) {
            return $value->isCompleted();
        });
        
        return view('admin.campaigns')->with('campaigns', $completedCampaigns);
    }
    
    public function indexAdminPendingCampaign(){
        $pendingCampaigns = Campaign::whereStatus(0)->get();
        return view('admin.campaigns')->with('campaigns', $pendingCampaigns);
    }
    
    public function indexAdminCancelledCampaign(){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $cancelledCampaigns = Campaign::whereStatus(2)->get();
        return view('admin.campaigns')->with('campaigns', $cancelledCampaigns);
    }
    
    public function indexAdminBlockedCampaign(){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $blockedCampaigns = Campaign::whereStatus(3)->get();
        return view('admin.campaigns')->with('campaigns', $blockedCampaigns);
    }
    
    public function indexAdminDeclinedCampaign(){
        // 0:pending, 1:approved, 2:cancelled, 3:blocked, 4:declined
        $declinedCampaigns = Campaign::whereStatus(4)->get();
        return view('admin.campaigns')->with('campaigns', $declinedCampaigns);
    }
    
    
    public function indexAdminCampaign($category='pending'){
        return view('admin.campaigns')->with('category', $category);
    }
    /*
     * admin activities ends
     */
    
    
    
    
    
    /**
     * seller can create a product
     */
    public function create(Request $request) {
        $countries = Country::all();
        $categories = Category::all();
        return view('dashboard.createCampaign', compact('countries', 'categories', 'request'));
    }
    
    public function store(Request $request) {
        $rules = [
            'country_id' => 'required',
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'goal' => 'required',
            'end_method' => 'required',
        ];
        $this->validate($request, $rules);

        $user_id = Auth::user()->id;
        $slug = Helper::unique_slug($request->title);
        
        $data = [
            'user_id' => $user_id,
            'category_id' => $request->category,
            'country_id' => $request->country_id,
            'address' => $request->address,
            
            'slug' => $slug,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'feature_image' => $this->storeImage($request),
            'feature_video' => $request->video,
            
            'goal' => $request->goal,
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

        if ($create) {
            return redirect(route('campaign.edit', $create->id))->with('success', trans('app.campaign_created'));
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
        return $dbPath;
    }
    
    
    
    public function showAdminCampaign($campaignID){}
    
    
    
    
    public function edit($campaignId) {
        $campaign = Campaign::find($campaignId);
        $countries = Country::all();
        $categories = Category::all();
        return view('dashboard.editCampaign')->with(compact('campaign', 'countries', 'categories'));
    }
    
    public function update(Request $request, $campaignId) {
        $rules = [
            'country_id' => 'required',
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'goal' => 'required',
            'end_method' => 'required',
            'feature_image' => 'required|mimes:jpeg,jpg,png',
        ];
//        $this->validate($request, $rules);
        
        $campaign = Campaign::find($campaignId);
        
        $slug = Helper::unique_slug($request->title);
        
        $campaign->category_id = $request->category;
        $campaign->country_id = $request->country_id;
        $campaign->address = $request->address;
        
        $campaign->slug = $slug;
        $campaign->title = $request->title;
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
        
        if ($updated) {
            return redirect(route('campaign.showGuestCampaign', $campaignId))->with('success', trans('app.campaign_created'));
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
        try {
            $resized->save($imagePublicPath);
            if ($previous_photo && file_exists($publicPath.$previous_photo)) {
                unlink($publicPath.$previous_photo);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return $dbPath;
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
    public function destroy() {
        
    }
}
