<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequestItem extends Model
{
    use HasFactory;
    
    
    
    protected $fillable = [
            'withdraw_request_id',
            'campaign_id',
            'requested_amount',
            'paid_amount',
            'status',
            'block_msg',
        ];
    
    
    public function withdrawRequest() {
        return $this->belongsTo(WithdrawRequest::class);
    }
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }


    // statuses -------------------------------------------------
    public function isPending() {
        return (int)$this->status === 1;
    }
    
    public function isFunded() {
        return (int)$this->status === 2;
    }
    
    public function isBlocked() {
        return (int)$this->status === 3;
    }
    
    public function isCurrentlyBlocked() {
        return (int)$this->currently_blocked;
    }
    
    // setters --------
    public function setPending() {
        $this->status = 1;
    }
    
    public function setFunded() {
        $this->status = 2;
    }
    
    public function setBlocked() {
        $this->status = 3;
    }
    
    public function setCurrentlyBlocked() {
        $this->campaign->withdrawRequestItems->map(function($wReqItem){
            $wReqItem->currently_blocked = false;
        });
        $this->currently_blocked = true;
    }
    // statuses end -------------------------------------------------
    
}
