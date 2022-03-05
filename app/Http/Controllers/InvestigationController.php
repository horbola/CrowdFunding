<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Models\Investigation;
use App\Models\Campaign;

use App\Mail\InvestigationReport;



class InvestigationController extends Controller
{
    // reners the licence agrement form
    public function createVolunteer(Request $request) {
        $title = 'Be a Volunteer';
        $menuName = 'be-volunteer';
        
        // check first whether a user has completed her profile
        $fields = Auth::user()->isProfileComplete();
        $message = 'You didn\'t comple your profile.' .$fields. ' are not filled. To be a volunteer, you have to fillup those fields.';
        if($fields){
            $title = 'Incomplete Profile';
            $request->request->add(['origUrl' => route('volunteer.create')]);
            return view('campaign.incomplete-profile-msg', compact('message', 'title', 'menuName'));
        }
        
        return view('investigation.volunteer-create', compact('title', 'menuName'));
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
    public function indexInvestigations(Request $request) {
        $title = 'My Investigated Campaigns';
        $menuName = 'investigation';
        if(Auth::check()){
            $user = Auth::user();
            $investigations = Investigation::where('user_id', $user->id)->get();
            $campaigns = $investigations->map(function($investigation, $key){
                return $investigation->campaign;
            });
            return view('campaign.campaigns-list', compact('request', 'user', 'campaigns', 'title', 'menuName'));
        }
        return redirect()->route('campaign.indexGuestCampaign');
    }
    
    // renders campaign list page to investigate. after clicking on any
    // campaign tile the detail page comes up. if clikcing on upload 
    // ivestigation info then 'createInvestigationForm()' method will be callded.
    public function createInvestigation(Request $request, $categoryId=1) {
        $title = 'Campaigns To Investigate';
        $menuName = 'investigate';
        $campaigns = Campaign::all()->reject(function($aCampaign){
            return $aCampaign->isPostedToVerify() || $aCampaign->isVerified();
        });
        // this variable is difined to detect that the campaign detali page has come from 'investigate' button.
        // this variable is passed to the 'campaign-detail' page through the 'campaign-master' page.
        $request->request->add(['indexInvestigation' => true]);
//        return view('face.camp-master', compact('categories', 'active', 'campaigns', 'title', 'menuName'));
        return view('campaign.campaigns-list', compact('campaigns', 'title', 'menuName'));
    }
    
    // brings the form by which investigation description and images could be uploaded.
    public function createInvestigationForm() {
        $title = 'Upload Investigation Info';
        $menuName = 'investigate';
        return view('investigation.investigation-create', compact('title', 'menuName'));
    }
    
    public function storeInvestigation(Request $request, $campaignId) {
        $rules = [
            'text_report' => 'required',
        ];
        $this->validate($request, $rules);

        $userId = Auth::user()->id;
        $invedByMe = Investigation::whereUserId($userId)->whereCampaignId($campaignId)->get()->count();
        $invedByOther = Investigation::whereCampaignId($campaignId)->get()->count();
        if($invedByMe){
            return back()->with('error', 'You already have investigated this campaign');
        }
        else if ($invedByOther){
            return back()->with('error', 'This Campaign is already investigated by some one else');
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
    
    public function updateApproval($invId) {
        $inv = null;
        if($invId){
            $inv = Investigation::find($invId);
        }
        $updated = null;
        if( $inv && $inv->count() ){
            $inv->is_verified = 'yes';
            $updated = $inv->save();
        }
        
        session(['approving' => 'true']);
//        $request->request->add(['approving' => 'yes']);
        if($updated){
            $inv->refresh();
            Mail::to($inv->investigator)->send(new InvestigationReport($inv));
            return back();
        }
    }
    
    public function updateCancel($invId) {
        $inv = Investigation::find($invId);
//        Mail::to($inv->investigator)->send(new InvestigationReport($inv));
        $inv->delete();
        return back();
    }
    
    // renders the form from wchich user can resign volunteer
    public function destroyVolunteer() {
        $title = 'Delete Volunteer';
        $menuName = 'resign-volunteer';
        return view('investigation.volunteer-resign', compact('title', 'menuName'));
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
