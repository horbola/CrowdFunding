<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    
    
    
    
    protected $fillable = [
            'user_id',
            'bank_name',
            'bank_swift_code',
            'branch_name',
            'branch_swift_code',
            'owner_name',
            'owner_nid',
            'acc_number',
            'status',
        
        ];
    
    
    public function holder() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function withdrawPayments() {
        return $this->hasMany(WithdrawPayment::class);
    }
    
}
