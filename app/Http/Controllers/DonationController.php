<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/*
 * each donation or order has theree steps to complete.
 * 1. checkout
 * 2. payment
 * 3. delivery
 * order table will have a status column with those three status
 * 
 * payment has two steps
 * 1. request 
 * 2. validation
 */
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
    
    // it's called by 'login' link
    public function createPaymentInfoFromLogin(Request $request) {
        return view('donation.payment-info-dialogue', compact('request'));
    }
    
    // it's called by 'complete donation' button
    public function createPaymentInfo(Request $request) {
        $rules = [
            'name' => 'required|string:100',
            'email' => 'required|email|unique:App\Models\User,email',
            'phone' => 'numeric',
        ];
        $validated = $this->validate($request, $rules);
        
//        $userExists = User::where('email', $validated['email'])->get()->count();
//        if($userExists){
//            $message = 'This email is already used. If you are registered before with this email, then try to login.'
//                    . 'Credential was sent to you via this email. Or you can change your password if you have'
//                    . 'provided any alternate method to reach you';
//            return back()->withInput();
//        }
        
        // create user and transform into logged in
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make(Str::random(10)),
        ]);
        
        $userExtra = UserExtra::create([
            'user_id' => $user->id,
            'phone' => $validated['phone'],
        ]);
        
        $address = Address::create([
            'user_id' => $user->id,
            'type' => 'current',
            'country_id' => '18',
        ]);
        
        $address = Address::create([
            'user_id' => $user->id,
            'type' => 'permanent',
            'country_id' => '18',
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
