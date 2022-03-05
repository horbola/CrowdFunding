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
    
    
}
