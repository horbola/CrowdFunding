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
        $withdraw_request = json_decode($request->withdraw_request);
        $withReq = WithdrawRequest::find($request->withdraw_request_id);
        
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
        
        $totalPayable = 0;
        Log::debug($withdraw_request);
        Log::debug('withdraw request  '.$withReq);
        foreach ($withdraw_request as $wReqItemRaw) {
            $wReqItemModel = WithdrawRequestItem::whereWithdrawRequestId( $withReq->id )->whereCampaignId( $wReqItemRaw->campaign_id )->get()->first();
            Log::debug('withdraw request item  '.$wReqItemModel);
//            dump($wReqItemModel);
            Log::debug('campaign-id:  '.$wReqItemRaw->campaign_id);
            Log::debug('model-id:  '.$wReqItemModel->requested_amount);
            if($wReqItemRaw->is_blocked){
                $wReqItemModel->status = 2;
                $wReqItemModel->block_msg = $wReqItemRaw->block_msg;
            }
            else {
                $wReqItemModel->paid_amount = $wReqItemRaw->payable_amount;
                $totalPayable += $wReqItemModel->paid_amount;
                $wReqItemModel->status = 1;
            }
            $wReqItemModel->save();
        }
        Log::debug($totalPayable);
        $withReq->status = 2;
        $withReq->save();
        
        Log::debug($request->new_pay_meth);
        Log::debug('mobile_number'.$request->mobile_number);
        
        $created = WithdrawPayment::create([
            'withdraw_request_id' => $withReq->id,
            'payment_meth_type' => $withReq->user->currentPayMethType(),
            'payment_meth_id' => $withReq->user->currentPayMeth()->id,
            'amount' => $totalPayable,
            'currency' => 'bdt',
            'trans_id' => $request->trans_id,
        ]);
        
        $created = true;
        if($created){
            return redirect(route('fund.indexAdminFundPanel'));
        }
        else return back();
    }
    
    private function hasBlocked($wReq) {
        foreach ($wReq as $wReqItem) {
            if($wReqItem->is_blocked){
                return true;
            }
        }
    }

}
