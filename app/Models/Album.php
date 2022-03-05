<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    protected $fillable = ['campaign_id', 'image_path', 'video_path'];
    
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
    
    
    
    
    public function thumbImagePath() {
        return $thumbImagePath = str_replace('full', 'thumb', $this->image_path);
    }
}
