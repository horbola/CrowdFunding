<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $fillable = ['user_id', 'anonymous', 'campaign_id'];
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
    public function payments() {
        return $this->hasMany(Payment::class);
    }
    
    public function donor() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /*
     * a campaigner may have created multiple campaigns. and
     * for a campaign there may have multiple donations. and
     * within a donation there may be multiple payments.
     * 
     * this method counts sum of payable abount of all payment
     * within a donation
     */
    public function totalPayableAmount() {
        return $this->payments->sum(function ($aPayment) {
            return $aPayment->amount - (($aPayment->amount/100)*20);
        });
    }
    
    /*
     * this method counts sum of payed abount by a user of all
     * payment within a donation.
     * payed amount is the original amount of a donor without
     * any reduction of platform cost.
     */
    public function totalPayedAmount() {
        return $this->payments->sum(function ($aPayment) {
            return $aPayment->amount;
        });
    }
}
