<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Country;

class Address extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type',
        'user_id',
        'phone',
        'careof',
        'careof_phone',
        'holding',
        'road',
        'upazilla',
        'district',
        'country_id',
        'post_code',
        'facebook',
        'twitter',
        'nid',
    ];
    protected $guarded = [];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function country() {
        return $this->belongsTo(Country::class);
    }
    
    
    
    
    public function toString() {
        return 'Holding: ' . ($this->holding.'/ ' ?? '- / ')
              .'Road: ' . ($this->road.'/ ' ?? '- / ')
              .'Upazilla: ' . ($this->upazilla.'/ ' ?? '- / ')
              .'District: ' . ($this->district.'/ ' ?? '- / ')
              .'Country: ' . ($this->country->nicename ?? '');
    }
}
