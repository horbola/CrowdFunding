<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    
    public function createDialogues(Request $request) {
        if(Auth::check()){
            return view('donation.payment-info-dialogue', compact('request'));
        }
        else {
            return view('donation.donor-info-dialogue', compact('request'));
        }
    }
    
    public function createPaymentInfoFromLogin(Request $request) {
        return view('donation.payment-info-dialogue', compact('request'));
    }
    
    public function createPaymentInfo(Request $request) {
        $rules = [
            'name' => 'required|string:100',
            'email' => 'required|email',
            'phone' => 'numeric',
        ];
        $validated = $this->validate($request, $rules);
        // create user and transform into logged in
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => '123456',
        ];
        $user = User::create($data);
        
        $address = Address::create([
            'user_id' => $user->id,
            'phone' => $validated['email'],
            'careof' => 'jwel',
            'holding' => '24',
            'road' => '10',
            'city' => 'dhaka',
            'division' => 'dhaka',
            'country_id' => '18',
            'nid' => '1990751105700003',
        ]);
        
        Auth::login($user, true);
        
        $request->user_id = $user->id;
        return view('donation.payment-info-dialogue', compact('request'));
    }
    
    
    public function store(Request $request) {
        $rules = [
            'campaign_id' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
            'card_no' => 'required',
        ];
        $this->validate($request, $rules);
        
        $data = [
            'user_id' => Auth::user()->id,
            'campaign_id' => $request->campaign_id,
        ];
        $donation = Donation::create($data);
        
        $data = [
            'donation_id' => $donation->id,
            'payment_meth_type' => $request->payment_method,
            'card_no' => $request->card_no,
            'amount' => $request->amount,
            'trans_id' => '123456',
        ];
        $payment = Payment::create($data);
        
        if($donation && $payment){
            return redirect(route('campaign.showGuestCampaign', $request->campaign_id));
        }
        return back()->withInput()->with('error', 'Sorry, your donation couldn\'t be made. Please consider trying once more');
    }
    
    
    
    
    
    
    
    
    
    /*
     * responds to ajax request (not used)
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
}
