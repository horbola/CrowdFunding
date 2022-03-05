<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawPayment extends Model
{
    use HasFactory;
    
    
    
    protected $fillable = [
            'withdraw_request_id',
            'payment_meth_type',
            'payment_meth_id',
            'amount',
            'currency',
            'trans_id',
        ];
    
    
    public function withdrawRequest() {
        return $this->belongsTo(WithdrawRequest::class);
    }
    
    public function bank() {
        return $this->belongsTo(Bank::class);
    }
    
    public function mobileBank() {
        return $this->belongsTo(MobileBank::class);
    }
    
}
