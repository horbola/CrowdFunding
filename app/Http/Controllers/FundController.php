<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

use App\Models\User;
use App\Models\WithdrawRequest;

class FundController extends Controller
{
    
    public function indexCampaignerFundPanel() {
        $title = 'Fund Panel';
        $menuName = 'withdraw-fund';
//        $wRequestsPend = Auth::user()->wRequests()->whereStatus('1')->get();
        $wRequestsPend = Auth::user()->wRequests->filter(function($wRequest){
            return $wRequest->isPending();
        });
        
//        dd(Auth::user()->wRequests);
//        dd(Auth::user()->wRequests->count());
//        dd($wRequestsPend );
//        $wRequestsComp = Auth::user()->wRequests()->whereStatus('2')->get();
        $wRequestsComp = Auth::user()->wRequests->filter(function($wRequest ,$key){
            return $wRequest->isComplete();
        });
        $wRequestsCan = Auth::user()->wRequests()->whereIsCancelled(true)->get();
        
        return view('fund.campaigner-fund-panel', compact('wRequestsPend', 'wRequestsComp', 'wRequestsCan', 'title', 'menuName'));
    }
    
    public function showFundableCampaigns() {
        $title = 'All Fundable Campaigns';
        $menuName = 'withdraw-fund';
        $fundable = Auth::user()->totalUserFundableCampaigns();
//        dd($fundable);
        return view('fund.funded-camps-fundable', compact('fundable', 'title', 'menuName'));
    }
    
    public function showFundingPendedCampaigns() {
        $title = 'Funding-Pended Campaigns';
        $menuName = 'withdraw-fund';
        $pended = Auth::user()->totalUserPendingCampaigns();
        return view('fund.funded-camps-pended', compact('pended', 'title', 'menuName'));
    }
    
    public function showCompletelyFundedCampaigns() {
        $title = 'Completely Funded Campaigns';
        $menuName = 'withdraw-fund';
        $completely = Auth::user()->totalUserCompletelyFundedCampaigns();
        return view('fund.funded-camps-completely', compact('completely', 'title', 'menuName'));
    }
    
    public function showPartlyFundedCampaigns() {
        $title = 'Partly Funded Campaigns';
        $menuName = 'withdraw-fund';
        $partly = Auth::user()->totalUserPartlyFundedCampaigns();
        return view('fund.funded-camps-partly', compact('partly', 'title', 'menuName'));
    }
    
    public function showNotFundedCampaigns() {
        $title = 'Not Funded Campaigns';
        $menuName = 'withdraw-fund';
        $not = Auth::user()->totalUserNotFundedCampaigns();
        return view('fund.funded-camps-not', compact('not', 'title', 'menuName'));
    }
    
    public function showFundingBlockedCampaigns() {
        $title = 'Funding-Blocked Campaigns';
        $menuName = 'withdraw-fund';
        $blocked = Auth::user()->totalUserFundingBlockedCampaigns();
        return view('fund.funded-camps-blocked', compact('blocked', 'title', 'menuName'));
    }
    
    
    
    
    
    
    
    public function indexAdminFundPanel() {
        $title = 'Fund Panel';
        $menuName = 'fund';
        $fundableCamps = $this->totalFundableCampaigns();
        $pendingCamps = $this->totalPendingCampaigns();
        $compCamps = $this->totalCompFundedCampaigns();
        $partlyCamps = $this->totalPartlyFundedCampaigns();
        $notCamps = $this->totalNotFundedCampaigns();
        $blockedCamps = $this->totalFundingBlockedCampaigns();
        
        $totalFund = $this->totalFund();
        $totalReqFund = $this->totalRequestedFund();
        $totalPaidFund = $this->totalPaidFund();
        $totalResFund = $this->totalResidualFund();
        
        $wRequestsPend = WithdrawRequest::all()->filter(function($wRequest ,$key){
            return $wRequest->isPending();
        });
        $wRequestsComp = WithdrawRequest::all()->filter(function($wRequest ,$key){
            return $wRequest->isComplete();
        });
        $wRequestsCan = WithdrawRequest::whereIsCancelled(true)->get();
        
        return view('fund.admin-fund-panel', compact(
                'fundableCamps',
                'pendingCamps',
                'compCamps',
                'partlyCamps',
                'notCamps',
                'blockedCamps',
                
                'totalFund',
                'totalReqFund',
                'totalPaidFund',
                'totalResFund',
                
                'wRequestsPend',
                'wRequestsComp',
                'wRequestsCan',
                
                'title',
                'menuName',
            ));
    }
    
    public function indexFundableCampaigns(){
        $title = 'Fundable Campaigns';
        $menuName = 'fund';
        $fundableCamps = $this->totalFundableCampaigns();
        return view('fund.funded-camps-fundable-admin', compact('fundableCamps', 'title', 'menuName'));
    }
    
    public function indexPendingCampaigns(){
        $title = 'Funding-Pended Campaigns';
        $menuName = 'fund';
        $pendingCamps = $this->totalPendingCampaigns();
        return view('fund.funded-camps-pending-admin', compact('pendingCamps', 'title', 'menuName'));
    }
    
    public function indexCompFundedCampaigns(){
        $title = 'Completely Funded Campaigns';
        $menuName = 'fund';
        $compFundedCamps = $this->totalCompFundedCampaigns();
        return view('fund.funded-camps-comp-admin', compact('compFundedCamps', 'title', 'menuName'));
    }
    
    public function indexPartlyFundedCampaigns(){
        $title = 'Partly Campaigns';
        $menuName = 'fund';
        $partlyFundedCamps = $this->totalPartlyFundedCampaigns();
        return view('fund.funded-camps-partly-admin', compact('partlyFundedCamps', 'title', 'menuName'));
    }
    
    public function indexNotFundedCampaigns(){
        $title = 'Not Funded Campaigns';
        $menuName = 'fund';
        $notFundedCamps = $this->totalNotFundedCampaigns();
        return view('fund.funded-camps-not-admin', compact('notFundedCamps', 'title', 'menuName'));
    }
    
    public function indexFundingBlockedCamps(){
        $title = 'Funding-Blocked Campaigns';
        $menuName = 'fund';
        $blockedFundedCamps = $this->totalFundingBlockedCampaigns();
        return view('fund.funded-camps-blocked-admin', compact('blockedFundedCamps', 'title', 'menuName'));
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    private function totalFund(){
        $users = User::all();
        $totalFund = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->sum(function($aUser){
            return $aUser->totalFund();
        });
        
        return $totalFund;
    }
    
    private function totalRequestedFund(){
        $users = User::all();
        $totalFund = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->sum(function($aUser){
            return $aUser->totalUserRequestedFund();
        });
        
        return $totalFund;
    }
    
    private function totalPaidFund(){
        $users = User::all();
        $totalFund = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->sum(function($aUser){
            return $aUser->totalPaidFundToUser();
        });
        
        return $totalFund;
    }
    
    private function totalResidualFund(){
        $users = User::all();
        $totalFund = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->sum(function($aUser){
            return $aUser->totalUserResidualFund();
        });
        
        return $totalFund;
    }
    
    
    
    
    
    private function totalFundableCampaigns(){
        $users = User::all();
        $pendingCamps = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->map(function($aUser){
            return $aUser->totalUserFundableCampaigns();
        });
        
        $pendingCampsMerge = new Collection;
        foreach($pendingCamps as $cf){
            $pendingCampsMerge = $pendingCampsMerge->merge($cf);
        }
        
        return $pendingCampsMerge;
    }
    
    private function totalPendingCampaigns(){
        $users = User::all();
        $pendingCamps = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->map(function($aUser){
            return $aUser->totalUserPendingCampaigns();
        });
        
        $pendingCampsMerge = new Collection;
        foreach($pendingCamps as $cf){
            $pendingCampsMerge = $pendingCampsMerge->merge($cf);
        }
        
        return $pendingCampsMerge;
    }
    
    private function totalCompFundedCampaigns(){
        $users = User::all();
        $pendingCamps = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->map(function($aUser){
            return $aUser->totalUserCompletelyFundedCampaigns();
        });
        
        $pendingCampsMerge = new Collection;
        foreach($pendingCamps as $cf){
            $pendingCampsMerge = $pendingCampsMerge->merge($cf);
        }
        
        return $pendingCampsMerge;
    }
    
    private function totalPartlyFundedCampaigns(){
        $users = User::all();
        $pendingCamps = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->map(function($aUser){
            return $aUser->totalUserPartlyFundedCampaigns();
        });
        
        $pendingCampsMerge = new Collection;
        foreach($pendingCamps as $cf){
            $pendingCampsMerge = $pendingCampsMerge->merge($cf);
        }
        
        return $pendingCampsMerge;
    }
    
    private function totalNotFundedCampaigns(){
        $users = User::all();
        $pendingCamps = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->map(function($aUser){
            return $aUser->totalUserNotFundedCampaigns();
        });
        
        $pendingCampsMerge = new Collection;
        foreach($pendingCamps as $cf){
            $pendingCampsMerge = $pendingCampsMerge->merge($cf);
        }
        
        return $pendingCampsMerge;
    }
    
    private function totalFundingBlockedCampaigns(){
        $users = User::all();
        $pendingCamps = $users->filter(function($aUser) {
            return $aUser->campaign()->get()->count();
        })->map(function($aUser){
            return $aUser->totalUserFundingBlockedCampaigns();
        });
        
        $pendingCampsMerge = new Collection;
        foreach($pendingCamps as $cf){
            $pendingCampsMerge = $pendingCampsMerge->merge($cf);
        }
        
        return $pendingCampsMerge;
    }
    
}
