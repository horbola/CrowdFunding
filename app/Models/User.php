<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Country;
use App\Permissions\HasPermissionsTrait;
use App\Models\Role;
use App\Models\Permission;
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
        'two_factor_code',
        'two_factor_expires_at',
        'photo',
        'gender',
        'country_id',
        'phone',
        'website',
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
    ];
    
    
    
    public function address(){
        return $this->hasOne(Address::class);
    }
    
    public function views() {
        return $this->hasMany(View::class);
    }
    
    public function campaign() {
        return $this->hasMany(Campaign::class);
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
     * builds the location of the campaigner based on his address
     */
    public function location() {
        $address = $this->address;
        $location = $address->division.', '.$address->country->nicename;
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
