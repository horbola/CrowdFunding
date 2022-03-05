<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Country;

class Address extends Model
{
    use HasFactory;
    
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
              .'City: ' . ($this->city.'/ ' ?? '- / ')
              .'Division: ' . ($this->division.'/ ' ?? '- / ')
              .'Country: ' . ($this->country->nicename ?? '');
    }
}
