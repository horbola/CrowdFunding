<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Permissions\HasPermissionsTrait;
use App\Models\Address;
use App\Models\View;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'fb_id',
        'google_id',
        'password',
        'two_factor_code',
        'two_factor_expires_at',
        'active_status',
        'is_volunteer',
        'is_special',
        'is_admin',
        'is_super',
        'photo',
        'gender',
        'about',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
    ];
    
    
    
    // statuses ------------------------------------------------------------------------------
    public function isPending() {
        return $this->active_status === 0;
    }
    
    public function isActive() {
        return $this->active_status === 1;
    }
    
    public function isMalicous() {
        return $this->active_status === 2;
    }
    
    public function isBlocked() {
        return $this->active_status === 3;
    }
    
    public function isLeft() {
        return $this->active_status === 4;
    }
    
    public function isPaused() {
        return $this->active_status === 5;
    }
    
    // setters------------------
    public function setPending() {
        $this->active_status = 0;
    }
    
    public function setActive() {
        $this->active_status = 1;
    }
    
    public function setMalicous() {
        $this->active_status = 2;
    }
    
    public function setBlocked() {
        $this->active_status = 3;
    }
    
    public function setLeft() {
        $this->active_status = 4;
    }
    
    public function setPaused() {
        $this->active_status = 5;
    }
    
    // volunteer -----------------
    public function isVolunteer() {
        return $this->is_volunteer === 2;
    }
    
    public function isVolRequested() {
        return $this->is_volunteer === 1;
    }
    
    public function isVolRemoved() {
        return $this->is_volunteer === 3;
    }
    
    public function isVolRejected() {
        return $this->is_volunteer === 4;
    }
    
    // volunteer setters ------------------
    public function setVolunteer() {
        $this->is_volunteer = 2;
    }
    
    public function setVolRequested() {
        $this->is_volunteer = 1;
    }
    
    public function setVolRemoved() {
        $this->is_volunteer = 3;
    }
    
    public function setVolRejected() {
        $this->is_volunteer = 4;
    }
    
    // admin ---------------
    public function isAdmin() {
        return $this->is_admin === 1;
    }
    
    public function isAdminRejected() {
        return $this->is_admin === 2;
    }
    
    public function isResigned() {
        return $this->is_admin === 3;
    }
    // admin setters--------------------
    public function setAdmin() {
        $this->is_admin = 1;
    }
    
    public function setAdminRejected() {
        $this->is_admin = 2;
    }
    
    public function setResigned() {
        $this->is_admin = 3;
    }
    // statuses end ------------------------------------------------------------------------------
    
    
    
    public function banks() {
        return $this->hasMany(Bank::class);
    }
    
    public function currentBank() {
        // 1.current bank, 2.past bank
        return $this->hasMany(Bank::class)->whereStatus('1')->first();
    }
    
    public function pastBank() {
        return $this->hasMany(Bank::class)->whereStatus('2');
    }
    
    public function mobileBanks() {
        return $this->hasMany(MobileBank::class);
    }
    
    public function currentMobileBank() {
        return $this->hasMany(MobileBank::class)->whereStatus('1')->first();
    }
    
    public function pastMobileBank() {
        return $this->hasMobileMany(MobileBank::class)->whereStatus('2');
    }
    
    public function currentPayMeth() {
        $bank = $this->currentBank();
        $mobileBank = $this->currentMobileBank();
        // if any one bank is available as currrent bank, that's enough.
        $current = collect([$bank, $mobileBank])->filter(function($item){
            return $item && $item->status === 1? true : false;
        })->first();
        return $current;
    }
    
    public function currentPayMethType() {
        $type = explode('\\', get_class($this->currentPayMeth()));
        return $type[sizeof($type) - 1];
    }
    
    public function makeAllPayMethPast() {
        $banks = Bank::whereUserId($this->id)->get();
        foreach ($banks as $bank) {
            $bank->status = 2;
            $bank->save();
        }
        
        $mobileBanks = MobileBank::whereUserId($this->id)->get();
        foreach ($mobileBanks as $bank) {
            $bank->status = 2;
            $bank->save();
        }
    }
    
    
    /* relation definition ;method */
    public function address(){
        // if is called with parentheses then the relation that means query will be returned
        // but if called without parentheses then a coolection of address model will be reurned.
        // but if it would be one to one relation then the address model would be returned 
        // but no entry in the database would be found then null would be returned.
        // but in case of one to many if no entry would be found in database then
        // an empty collecion intance would be returned.
        return $this->hasMany(Address::class);
    }
    
    /*
     * there will be one current address always and an user may have one
     * permanent address, one current address and multiple other addresses used
     * past as current address. whenever a permanent or current address changes
       the present permament or current address will be changed to past
     */
    /* relation definition wrapper ;method */
    public function currentAddress() {
        // the chain first() causes this query to return the address model
        return $this->address->where('type', 'current')->first();
    }
    
    public function permanentAddress() {
        return $this->address->where('type', 'permanent')->first();
    }
    
    /*
     * returns a collection of addresses.
     */
    public function pastAddresses() {
        if(!$this->address){
            return null;
        }
        $current = $this->address->where('type', 'past');
        return $current;
    }
    
    
    
    public function userExtra() {
        return $this->hasOne(UserExtra::class);
    }
    
    public function isProfileComplete() {
        $uExtra = $this->userExtra;
        $cAddr = $this->currentAddress();
        $pAddr = $this->permanentAddress();
            
        $unfilled = [];
        $unfilled['Name'] = $this->name? true : false;
        $unfilled['Birth date'] = $uExtra? ($uExtra->birth_date? $uExtra->birth_date: false) : false;
        $unfilled['Gender'] = $this->gender? true : false;
        $unfilled['Phone'] = $uExtra? ($uExtra->phone? $uExtra->phone: false) : false; 
        $unfilled['National ID'] = $uExtra? ($uExtra->nid? $uExtra->nid: false) : false;
        $unfilled['Email'] = $this->email? true : false;
        
        $unfilled['Current address holding'] = $cAddr? ($cAddr->holding? $cAddr->holding: false) : false;
        $unfilled['Current address road'] = $cAddr? ($cAddr->road? $cAddr->road: false) : false;
        $unfilled['Current address post Code'] = $cAddr? ($cAddr->post_code? $cAddr->post_code: false) : false;
        $unfilled['Current address upazilla'] = $cAddr? ($cAddr->upazilla? $cAddr->upazilla: false) : false;
        $unfilled['Current address district'] = $cAddr? ($cAddr->district? $cAddr->district: false) : false;
        $unfilled['Current address country'] = $cAddr? ($cAddr->country_id? $cAddr->country_id: false) : false;
        
        $unfilled['Permanent address holding'] = $pAddr? ($pAddr->holding? $pAddr->holding: false) : false;
        $unfilled['Permanent address road'] = $pAddr? ($pAddr->road? $pAddr->road: false) : false;
        $unfilled['Permanent address post Code'] = $pAddr? ($pAddr->post_code? $pAddr->post_code: false) : false;
        $unfilled['Permanent address upazilla'] = $pAddr? ($pAddr->upazilla? $pAddr->upazilla: false) : false;
        $unfilled['Permanent address district'] = $pAddr? ($pAddr->district? $pAddr->district: false) : false;
        $unfilled['Permanent address country'] = $pAddr? ($pAddr->country_id? $pAddr->country_id: false) : false;
        
        $unfilled['Care of name'] = $uExtra? ($uExtra->careof? $uExtra->careof: false) : false;
        $unfilled['Care of phone'] = $uExtra? ($uExtra->careof_phone? $uExtra->careof_phone: false) : false;
        
        $message = '';
        foreach ($unfilled as $key => $value) {
            if(!$value){
                $message .= $key.', ';
            }
        }
        return $message;
    }
    
    /*
    * returns avatar of the user if it exists. but not exists
    * returns a placeholder based on gender setup. but there's
    * no gender is setup or gender setup is 'others' then returns
    * a common placeholder avatar.
    */
    public function avatar() {
        if(!$this->photo)
            return '/uploads/placeholder/avatar/common.png';
        
        $avatarPath = public_path().$this->photo;
        if(file_exists($avatarPath)){
            return $this->photo;
        }
        else {
            switch ($this->gender) {
                case 'male' : return '/uploads/placeholder/avatar/boy.jpg';
                case 'female' : return '/uploads/placeholder/avatar/girl.jpg';
                default : return '/uploads/placeholder/avatar/common.png';
            }
        }
    }
    
    public function avatarCommon() {
        return '/uploads/placeholder/avatar/common.png';
    }
    
    public function userIndex(){
        $indexStr = 'Honorable ';
        
        if($this->is_super){
            return $indexStr.'Super';
        }
        else if($this->isAdmin()){
            return $indexStr.'Admin';
        }
        else if($this->is_special){
            return $indexStr.'Ambassador';
        }
        else if($this->isVolunteer()){
            return $indexStr.'Investigator';
        }
        else if($this->hasDonation()){
            return $indexStr.'Donor';
        }
        else if($this->hasCampaign()){
            return $indexStr.'Campaigner';
        }
        else return $indexStr.'Donor';
    }
    
    /*
     * builds the location of the campaigner based on his address
     */
    public function location() {
        $address = $this->currentAddress();
        $location = $address->district.', '.$address->country->nicename;
        return $location;
    }
    
    public function generateTwoFactorCode() {
        $this->timestamps = false;
        $this->two_factor_code = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(10);
        $this->save();
    }

    public function resetTwoFactorCode() {
        $this->timestamps = false;
        $this->two_factor_code = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }
    
    
    
    
    
    
    
    
    public function campaign() {
        return $this->hasMany(Campaign::class);
    }
    
    public function hasCampaign() {
        return $this->campaign->count();
    }
    
    public function views() {
        return $this->hasMany(View::class);
    }
    
    
    
    
    
    
    
    
    public function donations() {
        return $this->hasMany(Donation::class);
    }
    
    public function hasDonation() {
        return $this->donations->count();
    }
    
    public function totalDonation() {
        return $this->donations->sum(function ($aDonation) {
            return $aDonation->totalPayedAmount();
        });
    }
    
    
    
    
    
    
    

    public function wRequests() {
        return $this->hasMany(WithdrawRequest::class);
    }
    
        /*
     * a campaigner may have created multiple campaigns. and
     * for a campaign there may have multiple donations. and
     * within a donation there may be multiple payments.
     * 
     * this method counts total fund from all donations
     * for all campaigns of a campainger.
     */
    public function totalFund() {
        return $this->campaign->sum(function($aCampaign){
            return $aCampaign->totalSuccessfulDonation();
        });
    }
    
    public function totalUserRequestedFund() {
        return $this->campaign->sum(function($aCampaign){
            return $aCampaign->totalRequestedFund();
        });
    }
    
    public function totalPaidFundToUser() {
        return $this->campaign->sum(function($aCampaign){
            return $aCampaign->totalPaidFund();
        });
    }
    
    public function totalUserResidualFund() {
        return $this->campaign->sum(function($aCampaign){
            return $aCampaign->totalResidualFund();
        });
    }
    
    public function totalUserFundableCampaigns() {
        return $this->campaign->filter(function($aCampaign){
            switch($aCampaign->status){
                case 1:
                case 3:
                case 4:
                    return $aCampaign->isFundable();
                default:
                    return false;
            }
        });
    }
    
    public function totalUserPendingCampaigns() {
        return $this->campaign->filter(function($aCampaign){
            switch($aCampaign->status){
                case 1:
                case 3:
                case 4:
                    return $aCampaign->isPending();
                default:
                    return false;
            }
        });
    }
    
    public function totalUserCompletelyFundedCampaigns() {
        return $this->campaign->filter(function($aCampaign){
            switch($aCampaign->status){
                case 1:
                case 3:
                case 4:
                    return $aCampaign->isCompletelyFunded();
                default:
                    return false;
            }
        });
    }
    
    public function totalUserPartlyFundedCampaigns() {
        return $this->campaign->filter(function($aCampaign){
            switch($aCampaign->status){
                case 1:
                case 3:
                case 4:
                    return $aCampaign->isPartlyFunded();
                default:
                    return false;
            }
        });
    }
    
    public function totalUserNotFundedCampaigns() {
        return $this->campaign->filter(function($aCampaign){
            switch($aCampaign->status){
                case 1:
                case 3:
                case 4:
                    return $aCampaign->isNotFunded();
                default:
                    return false;
            }
        });
    }       
    
    public function totalUserFundingBlockedCampaigns() {
        return $this->campaign->filter(function($aCampaign){
            switch($aCampaign->status){
                case 1:
                case 3:
                case 4:
                    return $aCampaign->isFundingBlocked();
                default:
                    return false;
            }
        });
    }
    
}
