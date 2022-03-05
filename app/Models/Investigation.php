<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'text_report', 'image_report', 'video_report'];


    protected $gaurded = [];
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
}
