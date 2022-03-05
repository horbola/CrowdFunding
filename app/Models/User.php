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
        'photo',
        'gender',
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
    
    
    
    
    
    public function userExtra() {
        return $this->hasOne(UserExtra::class);
    }
    
    public function address(){
        return $this->hasMany(Address::class);
    }
    
    public function campaign() {
        return $this->hasMany(Campaign::class);
    }
    
    public function views() {
        return $this->hasMany(View::class);
    }
    
    public function donations() {
        return $this->hasMany(Donation::class);
    }

    public function wRequests() {
        return $this->hasMany(WithdrawRequest::class);
    }
    
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
    
    
    
    /*
     * returns avatar of the user if it exists. but not exists
     * returns a placeholder based on gender setup. but there's
     * no gender is setup or gender setup is 'others' then returns
     * a common placeholder avatar.
     */
    public function avatar() {
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
    
    /*
     * there will be one current address always and an user may have one
     * permanent address, one current address and multiple other addresses used
     * past as current address. whenever a permanent or current address changes
       the present permament or current address will be changed to past
     */
    public function currentAddress() {
        $current = $this->address->where('type', 'current')->first();
        return $current;
    }
    
    public function permanentAddress() {
        $current = $this->address->where('type', 'permanent')->first();
        return $current;
    }
    
    /*
     * returns a collection of addresses.
     */
    public function pastAddresses() {
        $current = $this->address->where('type', 'past');
        return $current;
    }
    
    /*
     * builds the location of the campaigner based on his address
     */
    public function location() {
        $address = $this->currentAddress();
        $location = $address->district.', '.$address->country->nicename;
        return $location;
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
                    return $aCampaign->isBlocked();
                default:
                    return false;
            }
        });
    }
    
    
    
    
    
    
    
    
    
    public function isProfileComplete() {
        $unfilled = [];
        $unfilled['Name'] = $this->name? true : false;
        $unfilled['Birth date'] = $this->userExtra->birth_date? true : false;
        $unfilled['Gender'] = $this->gender? true : false;
        $unfilled['Phone'] = $this->userExtra->phone? true : false;
        $unfilled['National ID'] = $this->userExtra->nid? true : false;
        $unfilled['Email'] = $this->email? true : false;
        
        $unfilled['Current address holding'] = $this->currentAddress()->holding? true : false;
        $unfilled['Current address road'] = $this->currentAddress()->road? true : false;
        $unfilled['Current address post Code'] = $this->currentAddress()->post_code? true : false;
        $unfilled['Current address upazilla'] = $this->currentAddress()->upazilla? true : false;
        $unfilled['Current address district'] = $this->currentAddress()->district? true : false;
        $unfilled['Current address country'] = $this->currentAddress()->country_id? true : false;
        
        $unfilled['Permanent address holding'] = $this->permanentAddress()->holding? true : false;
        $unfilled['Permanent address road'] = $this->permanentAddress()->road? true : false;
        $unfilled['Permanent address post Code'] = $this->permanentAddress()->post_code? true : false;
        $unfilled['Permanent address upazilla'] = $this->permanentAddress()->upazilla? true : false;
        $unfilled['Permanent address district'] = $this->permanentAddress()->district? true : false;
        $unfilled['Permanent address country'] = $this->permanentAddress()->country_id? true : false;
        
        $unfilled['Care of name'] = $this->userExtra->careof? true : false;
        $unfilled['Care of phone'] = $this->userExtra->careof_phone? true : false;
        
        $message = '';
        foreach ($unfilled as $key => $value) {
            if(!$value){
                $message .= $key.', ';
            }
        }
        return $message;
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
}
