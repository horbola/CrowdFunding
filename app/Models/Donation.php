<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $fillable = ['user_id', 'anonymous', 'campaign_id'];
    
    
    // statuses -----------------------------------------------------------------------------------
    public function isPending() {
        $this->allPayments->contains(function($aPayment){
            return $aPayment->isPending();
        });
    }
    
    public function isProcessing() {
        $this->allPayments->contains(function($aPayment){
            return $aPayment->isProcessing();
        });
    }
    
    /*
     * to get isComplete() variant, reverse the function.
     */
    public function isNotComplete() {
        $this->allPayments->contains(function($aPayment){
            return !$aPayment->isComplete();
        });
    }
    
    /*
     * to-do: implement later
     */
    public function isFailed() {
        
    }
    
    /*
     * to-do: implement later
     */
    public function isCanceled() {
        
    }
    // statuses end -----------------------------------------------------------------------------------
    
    
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
    /*
     * returns only those payments under a donation whitch are completed
     */
    public function payments() {
        return $this->hasMany(Payment::class)->whereStatus('Processing')->orWhere('status', 'Complete');
    }

    /*
     * returns all payments under a donation without any filter by status
     */
    public function allPayments() {
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
        # only those payament entry will be counted which atatus is processing or complete.
        return $this->payments->sum(function ($aPayment) {
//            return $aPayment->amount - (($aPayment->amount/100)*5);
            return $aPayment->amount;
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
