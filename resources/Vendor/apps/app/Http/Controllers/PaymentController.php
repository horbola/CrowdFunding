<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Payment;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    
    public function index(Request $request){
        $user = Auth::user();
        $title = trans('app.payments');

        if ($user->is_admin()){
            if ($request->q){
                $payments = Payment::success()->where('email', 'like', "%{$request->q}%")->orderBy('id', 'desc')->paginate(20);
            }else{
                $payments = Payment::success()->orderBy('id', 'desc')->paginate(20);
            }
        }else{
            $campaign_ids = $user->my_campaigns()->pluck('id')->toArray();

            if ($request->q){
                $payments = Payment::success()->whereIn('campaign_id', $campaign_ids)->where('email', 'like', "%{$request->q}%")->orderBy('id', 'desc')->paginate(20);
            }else{
                $payments = Payment::success()->whereIn('campaign_id', $campaign_ids)->orderBy('id', 'desc')->paginate(20);
            }

        }




        return view('admin.payments', compact('title', 'payments'));
    }
    
    public function view($id){
        $title = trans('app.payment_details');
        $payment = Payment::find($id);
        return view('admin.payment_view', compact('title', 'payment'));
    }

    public function withdraw(){
        $user = Auth::user();
        $title = trans('app.withdraw');
        $campaigns = $user->my_campaigns;
        $withdraw = $user->all_withdraw->sum('withdraw_amount');
        
        return view('admin.withdraw', compact('title', 'campaigns', 'withdraw'));
    }
    public function request(){
        $user = Auth::user();
        $title = 'Requested Withdraw';
        $withdraws = Withdraw::all();
        
        return view('admin.withdraw_request', compact('title', 'withdraws'));
    }

    public function withdrawRequest(Request $request){
        $user = Auth::user();
        $data = [
            'user_id'           => $user->id,
            'total_amount'      => $request->total_amount,
            'withdraw_amount'   => $request->withdraw_amount,
            'bank_name'         => $request->bank_name,
            'branch_name'       => $request->branch_name,
            'account_name'      => $request->branch_name,
            'account_number'    => $request->account_number,
            'withdraw_status'   => 'Submited',
        ];

        $withdraw_requested = Withdraw::create($data);

        if ($withdraw_requested){
            echo json_encode(['status' => '1', 'msg' => 'Withdraw request submited succesfully!']);
        }
        else{
            echo json_encode(['status' => '0', 'msg' => 'Withdraw request submited unsuccesfully!']);
        }
        
    }


}
