<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Collection;

use App\Models\User;
use App\Models\WithdrawRequest;

class FundController extends Controller
{
    
    public function indexCampaignerFundPanel() {
        $wRequestsPend = Auth::user()->wRequests()->whereStatus('1')->get();
        $wRequestsComp = Auth::user()->wRequests()->whereStatus('2')->get();
        return view('fund.campaigner-fund-panel', compact('wRequestsPend', 'wRequestsComp'));
    }
    
    
    
    
    
    
    public function showCompletelyFundedCampaigns() {
        $completely = Auth::user()->totalUserCompletelyFundedCampaigns();
        return view('fund.funded-camps-completely', compact('completely'));
    }
    
    public function totalAllCompletelyFundedCampaigns() {
        
    }

    public function showPartlyFundedCampaigns() {
        $partly = Auth::user()->totalUserPartlyFundedCampaigns();
        return view('fund.funded-camps-partly', compact('partly'));
    }
    
    public function showNotFundedCampaigns() {
        $not = Auth::user()->totalUserNotFundedCampaigns();
        return view('fund.funded-camps-not', compact('not'));
    }
    
    public function showFundingBlockedCampaigns() {
        $blocked = Auth::user()->totalUserFundingBlockedCampaigns();
        return view('fund.funded-camps-blocked', compact('blocked'));
    }
    
    
    
    
    
    
    
    public function indexAdminFundPanel() {
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
        
        $wRequestsPend = WithdrawRequest::where('status', '1')->get();
        $wRequestsComp = WithdrawRequest::where('status', '2')->get();
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
            ));
    }
    
    public function indexFundableCampaigns(){
        $fundableCamps = $this->totalFundableCampaigns();
        return view('fund.funded-camps-fundable-admin', compact('fundableCamps'));
    }
    
    public function indexPendingCampaigns(){
        $pendingCamps = $this->totalPendingCampaigns();
        return view('fund.funded-camps-pending-admin', compact('pendingCamps'));
    }
    
    public function indexCompFundedCampaigns(){
        $compFundedCamps = $this->totalCompFundedCampaigns();
        return view('fund.funded-camps-comp-admin', compact('compFundedCamps'));
    }
    
    public function indexPartlyFundedCampaigns(){
        $partlyFundedCamps = $this->totalPartlyFundedCampaigns();
        return view('fund.funded-camps-partly-admin', compact('partlyFundedCamps'));
    }
    
    public function indexNotFundedCampaigns(){
        $notFundedCamps = $this->totalNotFundedCampaigns();
        return view('fund.funded-camps-not-admin', compact('notFundedCamps'));
    }
    
    public function indexFundingBlockedCamps(){
        $blockedFundedCamps = $this->totalFundingBlockedCampaigns();
        return view('fund.funded-camps-blocked-admin', compact('blockedFundedCamps'));
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
