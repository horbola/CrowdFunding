<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['campaign_id', 'image_path', 'video_path', 'text'];
    
    
    
    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }
}
