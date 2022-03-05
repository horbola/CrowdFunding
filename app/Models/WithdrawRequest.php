<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;
    
    
    
    protected $fillable = ['user_id', 'status'];




    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function withdrawRequestItems() {
        return $this->hasMany(WithdrawRequestItem::class);
    }
    
    public function withdrawPayments() {
        return $this->hasMany(WithdrawPayment::class);
    }
    
    
    
    
    /*
     * calculate total amount of all campaings requested amount
     */
    public function totalRequestAmount() {
        return $this->withdrawRequestItems()->sum('requested_amount');
    }
    
    /*
     * calculate total amount of all campaings paid amount
     */
    public function totalPaidAmount() {
        return $this->withdrawRequestItems()->sum('paid_amount');
    }
    
    
    
    // statuses -------------------------------------------------
    public function isPending() {
        return $this->withdrawRequestItems->contains(function($wReqItem, $key){
            return $wReqItem->isPending();
        });
    }
    
    public function isComplete() {
        return $this->withdrawRequestItems->contains(function($wReqItem, $key){
            return $wReqItem->isFunded();
        });
    }
    // statuses end -------------------------------------------------
}
