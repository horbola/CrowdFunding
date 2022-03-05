<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Bank;
use App\Models\MobileBank;

class PaymentMethodController extends Controller{
    
    public function create() {
        return view('fund.add-pay-meth');
    }
    
    public function store(Request $request) {
        $stored = null;
        Auth::user()->makeAllPayMethPast();
        if($request->pay_meth_type && strtolower($request->pay_meth_type) === 'bank'){
            $stored = Bank::create([
               'user_id' => Auth::user()->id,
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
            $stored = MobileBank::create([
                'user_id' => Auth::user()->id,
                'brand_name' => $request->brand_name,
                'mobile_number' => $request->mobile_number,
                'owner_name' => $request->owner_name,
                'owner_nid' => $request->owner_nid,
                'status' => '1',
            ]);
        }
        
        if($stored){
            return redirect(session('wReqOrigUrl'));
        }
        else {
            return back();
        }
    }
}
