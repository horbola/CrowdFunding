<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    
    /*
     * responds to ajax request
     */
    public function createModel(Request $request) {
        // array_except($request->input(), ['_token']); or
        // $request->amount doesn't work
        // but it works: $amount = $request->input('amount');
        return [
            'success' => 1,
            'msg' => trans('app.settings_saved_msg'),
            'amount' => $request->input('amount'),
        ];
    }
    
    
    public function store(Request $request, $campaignId) {
        $rules = [
            'amount' => 'required',
        ];
        $this->validate($request, $rules);
        
        $data = [
            'user_id' => Auth::user()->id,
            'campaign_id' => $campaignId,
            'amount' => $request->amount,
        ];
        
        $created = Donation::create($data);
        
        if($created){
            return back();
        }
        return back()->with('error', 'Sorry, your donation couldn\'t be made. Please consider trying once more');
    }
}
