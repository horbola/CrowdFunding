<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesImg extends Model
{
    use HasFactory;
    
    protected $fillable = ['campaign_id', 'image_path', 'video_path'];
    
    
    
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
}
