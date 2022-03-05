<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Payment;
use App\Models\User;
use App\Models\Country;
use App\Models\UserExtra;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Mail\AccountCreation;


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
            $countries = Country::all();
            return view('donation.donor-info-dialogue', compact('request', 'countries'));
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
            'email' => 'required|email',
            'phone' => 'numeric',
            'current_holding' => 'nullable|string:30',
            'current_road' => 'nullable|string:30',
            'current_post_code' => 'nullable|string:30',
            'current_upazilla' => 'nullable|string:30',
            'current_district' => 'nullable|string:30',
            'current_country' => 'nullable|numeric',
        ];
        $validated = $this->validate($request, $rules);

        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user === null) {
            $randPass = Str::random(10);
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($randPass),
            ]);
            
            UserExtra::create([
                'user_id' => $user->id,
                'phone' => $validated['phone'],
            ]);
            
            Mail::to($user)->send(new AccountCreation($user, $randPass));
        }
        
        $currAddr = $this->isCurrAddrData($validated, $user);
        if ($currAddr)
            $currAddr->save();

        Auth::login($user, true);
        $request->user_id = $user->id;
        return view('donation.payment-info-dialogue', compact('request'));
    }
    
    
    private function isCurrAddrData($validated, $user) {
        $isAvailable = isset($validated['current_holding']) &&
            isset($validated['current_road']) &&
            isset($validated['current_post_code']) &&
            isset($validated['current_upazilla']) &&
            isset($validated['current_district']) &&
            isset($validated['current_country']);
        
        if($isAvailable){
            $currentAddress = Address::firstOrNew(['user_id' => $user->id, 'type' => 'current']);
            if(isset($validated['current_holding'])) $currentAddress->holding = $validated['current_holding'];
            if(isset($validated['current_road'])) $currentAddress->road = $validated['current_road'];
            if(isset($validated['current_post_code'])) $currentAddress->post_code = $validated['current_post_code'];
            if(isset($validated['current_upazilla'])) $currentAddress->upazilla = $validated['current_upazilla'];
            if(isset($validated['current_district'])) $currentAddress->district = $validated['current_district'];
            if(isset($validated['current_country'])) $currentAddress->country_id = $validated['current_country'];
            // $currentAddress->save();
            return $currentAddress;
        }
        return null;
    }
    
    
    
    
    // not used
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

}
