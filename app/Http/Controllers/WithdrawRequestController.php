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
    public function show($wRequestId) {
        $wRequests = WithdrawRequest::find($wRequestId);
        return view('fund.campaigner-fund-req-details', compact('wRequests'));
    }
    
    public function showToAdmin($wRequestId) {
        $wRequest = WithdrawRequest::find($wRequestId);
        return view('fund.admin-pending-fund-req-details', compact('wRequest'));
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
                // 1.pending, 2.processing, 3.complete
                'status' => 1,
            ]);
        }
        
        foreach($withdraw_request as $reqItem){
            $reqAmount = $reqItem->request_amount;
            $raised = Campaign::find( $reqItem->campaign_id )->totalSuccessfulDonation();
            if($reqAmount > $raised){
                $reqAmount = $raised;
            }
            
            if( ($reqItem->request_check === 1 || $reqItem->request_check === true) | $reqItem->request_amount ){
                $wReqItem = WithdrawRequestItem::create([
                    'withdraw_request_id' => $wRequest->id,
                    'campaign_id' => $reqItem->campaign_id,
                    'requested_amount' => $reqAmount,
                    'status' => 1,
                ]);
            }
        }
        
        if($wRequest){
            return redirect(route('fund.indexCampaignerFundPanel'));
        }
        else return back()->with('error', 'sorry this withdraw request couldn\'t be be made');
    }
}
