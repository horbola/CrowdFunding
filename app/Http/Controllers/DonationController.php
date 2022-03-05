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
use Illuminate\Support\Facades\Log;

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
class DonationController extends Controller {
    
    public function createDialogues(Request $request) {
        $title = 'Donating to a Campaign';
        $countries = Country::all();
        if(Auth::check()){
            $title = 'Add Your Current Address';
            return view('donation.address', compact('request', 'title', 'countries'));
        }
        else {
            return view('donation.donor-info-dialogue', compact('request', 'countries', 'title'));
        }
    }
    
    // it's called by 'complete donation' button
    public function createPaymentInfo(Request $request) {
        // if donor is donating as logged in or her account is created anew
        // then keep loggedin. but logout in other case to avoid risk of if
        // he enters already an existing account's email
        $request->logout = true;
        $validated = $this->validating($request);
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
            
            $request->logout = false;
            Mail::to($user)->send(new AccountCreation($user, $randPass));
        }
        
        // this code changes the actual current address of donor.
        // the risk if the donor uses someones's email to donate while 
        // not logged in, then that email holder's current address is changed
        $currAddr = $this->isCurrAddrData($validated, $user);
        $currAddr->save();

        Auth::login($user, true);
        $request->user_id = $user->id;
        $title = 'Donating to a Campaign';
        return view('donation.payment-info-dialogue', compact('request', 'title'));
    }
    
    // it's called when a logged in user donates.
    public function createPaymentInfoFromAddress(Request $request) {
        $validated = $this->validatingCurrAddr($request);
        $user = Auth::user();
        $currAddr = $this->isCurrAddrData($validated, $user);
        $currAddr->save();
        $request->user_id = $user->id;
        $title = 'Donating to a Campaign';
        return view('donation.payment-info-dialogue', compact('request', 'title'));
    }
    
    // it's called by 'Login' link
    public function createPaymentInfoFromLogin(Request $request) {
        $title = 'Donating to a Campaign';
        return view('donation.payment-info-dialogue', compact('request', 'title'));
    }
    
    

    
    private function validating($request) {
        $rules = [
            'name' => 'required|string:100',
            'email' => 'required|email',
            'phone' => 'required|numeric:20',
            'current_holding' => 'required|string:30',
            'current_road' => 'required|string:30',
            'current_post_code' => 'required|string:30',
            'current_upazilla' => 'required|string:30',
            'current_district' => 'required|string:30',
            'current_country' => 'required|numeric:3',
        ];
        return $this->validate($request, $rules, $this->donorInfoValidnMsg());
    }
    
    private function donorInfoValidnMsg() {
        return $validnMsg = [
            'name.required' => 'You must provide your name.',
            'name.string' => 'Name should be in characters and must be within 30 characters',
            'email.required' => 'You must provide your email address',
            'email.email' => 'You have to provide a valid email address in this input box',
            'phone.required' => 'You must provide your phone number',
            'phone.numeric' => 'Input your phone number in digits',
            'current_holding.required' => 'You must provide your current holding name',
            'current_holding.string' => 'Your current holding name can be in only numbers and characters',
            'current_road.required' => 'You must provide your current road number or village name in case',
            'current_road.string' => 'Your current road can be in only numbers and characters',
            'current_post_code.required' => 'You must provide your current post code',
            'current_post_code.string' => 'Your current post code can be in only numbers and characters',
            'current_upazilla.required' => 'You must provide your current upazila name',
            'current_upazilla.string' => 'Your current upazila name can be in only numbers and characters',
            'current_district.required' => 'You must provide your current district',
            'current_district.string' => 'Your current district can be in only numbers and characters',
            'current_country.required' => 'Select your country',
            'current_country.numeric' => 'Select your country',
        ];
    }
    
    private function validatingCurrAddr($request) {
        $rules = [
            'current_holding' => 'required|string:30',
            'current_road' => 'required|string:30',
            'current_post_code' => 'required|string:30',
            'current_upazilla' => 'required|string:30',
            'current_district' => 'required|string:30',
            'current_country' => 'required|numeric:3',
        ];
        return $this->validate($request, $rules, $this->donorCurrAddrValidnMsg());
    }
    
    private function donorCurrAddrValidnMsg() {
        return $validnMsg = [
            'current_holding.required' => 'You must provide your current holding name',
            'current_holding.string' => 'Your current holding name can be in only numbers and characters',
            'current_road.required' => 'You must provide your current road number or village name in case',
            'current_road.string' => 'Your current road can be in only numbers and characters',
            'current_post_code.required' => 'You must provide your current post code',
            'current_post_code.string' => 'Your current post code can be in only numbers and characters',
            'current_upazilla.required' => 'You must provide your current upazila name',
            'current_upazilla.string' => 'Your current upazila name can be in only numbers and characters',
            'current_district.required' => 'You must provide your current district',
            'current_district.string' => 'Your current district can be in only numbers and characters',
            'current_country.required' => 'Select your country',
            'current_country.numeric' => 'Select your country',
        ];
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
