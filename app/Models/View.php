<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class View extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    protected $fillable = ['user_id', 'campaign_id'];


    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
}