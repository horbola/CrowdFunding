<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\WithdrawRequestItem;
use App\Models\WithdrawRequest;
use App\Models\MobileBank;
use App\Models\Bank;
use App\Models\WithdrawPayment;

class WithdrawPaymentController extends Controller
{
    public function store(Request $request) {
        if(!$request->trans_id){
            return back()->with('error', 'You didn\'t provide any transaction key. Provide this trax with the tranx id which is provied by the bank to mark this transaction as unique');
        }
        $withdraw_request = json_decode($request->withdraw_request);
        $withReq = WithdrawRequest::find($request->withdraw_request_id);
        
        $this->createPayMeth($request, $withReq);
        
        $totalPayable = 0;
        // if this variable is true then it means at least one campaign is valid to complete the request.
        $isAnyWReqItem = null;
        foreach ($withdraw_request as $wReqItemRaw) {
            $wReqItemModel = WithdrawRequestItem::whereWithdrawRequestId( $withReq->id )->whereCampaignId( $wReqItemRaw->campaign_id )->get()->first();
            if( $wReqItemModel->campaign->isFundingBlocked() )
                continue;
            
            if($wReqItemRaw->is_blocked){
                $wReqItemModel->setBlocked();
                $wReqItemModel->setCurrentlyBlocked();
                $wReqItemModel->block_msg = $wReqItemRaw->block_msg;
            }
            else {
                $wReqItemModel->paid_amount = $wReqItemRaw->payable_amount;
                $wReqItemModel->setFunded();
                $totalPayable += $wReqItemModel->paid_amount;
            }
            $wReqItemModel->save();
            $isAnyWReqItem = true;
        }

        $payCreated = null;
        if($isAnyWReqItem){
            $payCreated = WithdrawPayment::create([
                        'withdraw_request_id' => $withReq->id,
                        'payment_meth_type' => $withReq->user->currentPayMethType(),
                        'payment_meth_id' => $withReq->user->currentPayMeth()->id,
                        'amount' => $totalPayable,
                        'currency' => 'bdt',
                        'trans_id' => $request->trans_id,
            ]);
        }
        else {
            $withReq->is_cancelled = true;
            $withReq->save();
            return back()->with('error', 'This request couldn\'t be completed. The campaign or Campaigns it includes may be blocked before or now by authority');
        }
        
        if($payCreated){
            return redirect(route('fund.indexAdminFundPanel'));
        }
        else return back();
    }

    private function createPayMeth($request, $withReq) {
        if($request->new_pay_meth === 'true'){
            $withReq->user->makeAllPayMethPast();
            if($request->pay_meth_type && strtolower($request->pay_meth_type) === 'bank'){
                $created = Bank::create([
                   'user_id' => $withReq->user->id,
                   'bank_name' => $request->bank_name,
                   'bank_swift_code' => $request->bank_swift_code, 
                   'branch_name' => $request->branch_name, 
                   'branch_swift_code' => $request->branch_swift_code, 
                   'owner_name' => $request->owner_name, 
                   'owner_nid' => $request->owner_nid,
                   'acc_number' => $request->acc_number, 
                   'status' => '1', 
                ]);
            }
            else if($request->pay_meth_type && strtolower($request->pay_meth_type) === 'mobile-bank') {
                $created = MobileBank::create([
                    'user_id' => $withReq->user->id,
                    'brand_name' => $request->brand_name,
                    'mobile_number' => $request->mobile_number,
                    'owner_name' => $request->owner_name,
                    'owner_nid' => $request->owner_nid,
                    'status' => '1',
                ]);
            }
        }
    }

}
