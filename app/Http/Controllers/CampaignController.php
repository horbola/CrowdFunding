<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }
    
    
    public function indexGuestCampaign($category='medical'){
        return view('campaign-list')->with('category', $category);
    }
    public function showGuestCampaign($campaignID){
        return view('campaign-single');
    }
    
    // it responds to an ajax request
    public function indexClientCampaign($type='donated'){
        return view('partial.dashboard.client-camp')->with('donated', $type);
    }
    public function showClientCampaign($campaignID){}
    
    
    public function indexCreatorCampaign($category='all'){}
    public function showCreatorCampaign($campaignID){}
    
    
    public function indexAdminCampaign($category='pending'){}
    public function indexAdminCampaignSummary($category='pending'){
        return view('admin.partial.dashboard.campaign-summary');
    }
    public function showAdminCampaign($campaignID){}
    
    
    
    
    /**
     * seller can create a product
     */
    public function create() {
        
    }
    
    
    public function store() {
        
    }
    
    
    public function edit() {
        
    }
    
    
    public function update() {
        
    }
    
    /**
     * only admin can destroy a product but not seller
     */
    public function destroy() {
        
    }

}
