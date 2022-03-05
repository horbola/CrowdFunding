<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\WithdrawRequest;
use App\Models\WithdrawRequestItem;
use App\Models\Campaign;

class WithdrawRequestController extends Controller
{
    /*
     * shows fund request details in campaigner panel. uses 'admin-pending-fund-req-details'
     */
    public function show($wRequestId) {
        $title = 'Fund Request Details';
        $menuName = 'withdraw-fund';
        $wRequest = WithdrawRequest::find($wRequestId);
        return view('fund.campaigner-fund-req-details', compact('wRequest', 'title', 'menuName'));
    }
    
    /*
     * shows fund request details in admin panel. uses 'admin-pending-fund-req-details'
     */
    public function showPendingToAdmin($wRequestId) {
        $title = 'Pending Fund Request Details';
        $menuName = 'fund';
        $wRequest = WithdrawRequest::find($wRequestId);
        return view('fund.admin-fund-req-details-pending', compact('wRequest', 'title', 'menuName'));
    }
    
    /*
     * shows fund request details in admin panel. uses 'campaigner-fund-req-details'
     */
    public function showCompletedToAdmin($wRequestId) {
        $title = 'Completed Fund Request Details';
        $menuName = 'fund';
        $wRequest = WithdrawRequest::find($wRequestId);
        return view('fund.campaigner-fund-req-details', compact('wRequest', 'title', 'menuName'));
    }
    
    public function showCancelledToAdmin($wRequestId) {
        $title = 'Cancelled Fund Request Details';
        $menuName = 'fund';
        $wRequest = WithdrawRequest::find($wRequestId);
        return view('fund.campaigner-fund-req-details', compact('wRequest', 'title', 'menuName'));
    }
    
    public function store(Request $request) {
        $withdraw_request = json_decode($request->withdraw_request);
        
        if( !Auth::user()->currentPayMeth() ){
            session()->put('wReqOrigUrl', url()->previous());
            return redirect(route('paymentMethod.create'));
        }

        $wRequest = null;
        if($withdraw_request){
            $wRequest = WithdrawRequest::create([
                'user_id' => Auth::user()->id,
            ]);
        }
        
        $skipped = null;
        foreach($withdraw_request as $reqItem){
            $reqItemCamp = Campaign::find( $reqItem->campaign_id );
            if( $reqItemCamp->isPending() || $reqItemCamp->isFundingBlocked() ) {
                $skipped = true;
                continue;
            }
            $reqAmount = $reqItem->request_amount;
            $raised = Campaign::find( $reqItem->campaign_id )->totalSuccessfulDonation();

            if($reqAmount > $raised){
                $reqAmount = $raised;
            }

            if( ($reqItem->request_check === 1 || $reqItem->request_check === true) && (int)$reqItem->request_amount ){
                $wReqItem = WithdrawRequestItem::create([
                    'withdraw_request_id' => $wRequest->id,
                    'campaign_id' => $reqItem->campaign_id,
                    'requested_amount' => $reqAmount,
                ]);
            }
        }
        
        // if an withdraw request item has no campaign included then it will be deleted and will be notified to user
        $deleted = null;
        if($wRequest && $wRequest->withdrawRequestItems && !$wRequest->withdrawRequestItems->count()){
            $deleted = $wRequest->delete();
        }
        
        if($wRequest){
            if($deleted && $skipped){
                return back()->with('error', 'sorry this withdraw request couldn\'t be be made, because it may have included pending or previously blocked campaigns for funding');
            }
            else if($deleted){
                return back()->with('error', 'sorry this withdraw request couldn\'t be be made, because it has no campaign incluede');
            }
            
            return redirect(route('fund.indexCampaignerFundPanel'));
        }
        else return back()->with('error', 'sorry this withdraw request couldn\'t be be made');
    }
}
