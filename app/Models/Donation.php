<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
    public function payment() {
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
        return $this->payment->sum(function ($aPayment) {
            return $aPayment->amount - (($aPayment->amount/100)*20);
        });
    }
}
