<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileBank extends Model
{
    use HasFactory;
    
    
    
    
    protected $fillable = [
            'user_id',
            'brand_name',
            'mobile_number',
            'owner_name',
            'owner_nid',
            'status',
        ];
    
    public function holder() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function withdrawPayments() {
        return $this->hasMany(WithdrawPayment::class);
    }
}
