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
        'trans_id',
    ];
    protected $guarded = [];
    
    public $am = 100;
}
