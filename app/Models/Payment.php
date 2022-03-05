<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'donation_id',
        'payment_meth_type',
        'payment_meth_id',
        'amount',
        'currency',
        'trans_id',
        'status',
    ];
    protected $guarded = [];
    
    public $am = 100;
    
    
    
    public function donation() {
        return $this->belongsTo(Donation::class);
    }  
  
    
}
