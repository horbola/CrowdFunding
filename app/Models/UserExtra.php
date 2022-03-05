<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExtra extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'user_id',
        'phone',
        'nid',
        'careof',
        'careof_phone',
        'facebook',
        'twitter',
    ];
    
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
