<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Investigation;
use App\Models\Campaign;
use App\Models\Category;



class InvestigationController extends Controller
{
    // reners the licence agrement form
    public function createVolunteer() {
        return view('investigation.volunteer-create');
    }
    
    // from the lincence agrement form user
    // sends a request to be a volunteer.
    public function storeVolunteer() {
        $user = Auth::user();
        if($user->is_volunteer === 1){
            return back()->with('info', 'You have already requested to be a volunteer.');
        }
        else if ($user->is_volunteer === 2){
            return back()->with('info', 'You are already a volunteer.');
        }
        else if ($user->is_volunteer === 3){
            return back()->with('error', 'You are removed from volunteer once. If you want to be again please consult the authority');
        }
        
        $user->is_volunteer = 1;
        $updated = $user->update();
        if($updated){
            return redirect()->route('user.show');
        }
        return back('error', 'There is a problem occured. Please try again');
    }
    
    // renders my investigations campaigns
    public function indexInvestigations() {
        if(Auth::check()){
            $user = Auth::user();
            $investigations = Investigation::where('user_id', $user->id)->get();
            $campaigns = $investigations->map(function($investigation, $key){
                return $investigation->campaign;
            });
            return view('campaign.campaigns-list', compact('user', 'campaigns'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    // renders campaign list page to investigate
    public function createInvestigation(Request $request, $categoryId=1) {
        $categories = Category::all();
        $active = $categoryId;
        $campaigns = Campaign::where('category_id', $categoryId)->get();
        // this variable is difined to detect that the campaign detali page has come from 'investigate' button.
        // this variable is passed to the 'campaign-detail' page through the 'campaign-master' page.
        $request->request->add(['indexInvestigation' => true]);
        return view('face.campaign-master')->with(compact('categories', 'active', 'campaigns'));
    }
    
    public function createInvestigationForm() {
        return view('investigation.investigation-create');
    }
    
    public function storeInvestigation(Request $request, $campaignId) {
        $rules = [
            'text_report' => 'required',
        ];
        $this->validate($request, $rules);

        $userId = Auth::user()->id;
        $investigation = Investigation::whereUserId($userId)->whereCampaignId($campaignId)->get()->count();
        if($investigation){
            return back()->with('error', 'You already have investigated this campaign and provided report');
        }
        $data = [
            'user_id' => $userId,
            'campaign_id' => $campaignId,
            'text_report' => $request->text_report,
            'image_report' => $request->image_report,
            'video_report' => $request->video_report,
        ];
        
        $created = Investigation::create($data);
        if($created){
            return back()->with('success', "Your investigation report has succesfully posted");
        }
        return back()->with('error', 'Sorry, there\'s an error occured');
    }
    
    // renders the form from wchich user can resign volunteer
    public function destroyVolunteer() {
        return view('investigation.volunteer-resign');
    }
    
    // ultimately resigns from volunteer
    public function confirmDestroyVolunteer() {
        $user = Auth::user();
        if($user->is_volunteer === 0){
            return back()->with('info', 'You have never been a volunteer to be deleted.');
        }
        else if ($user->is_volunteer === 3){
            return back()->with('info', 'You are already blocked. So you can not apply to be deleted.');
        }
        
        if(($user->is_volunteer === 1) || ($user->is_volunteer === 2)){
            $user->is_volunteer = 4;
            $user->withdrawRolesTo('volunteer');
        }
        $updated = $user->update();
        if($updated){
            return redirect()->route('user.show');
        }
        return back('error', 'There is a problem occured. Please try again');
    }
    
}
