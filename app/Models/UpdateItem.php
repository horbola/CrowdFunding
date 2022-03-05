<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateItem extends Model
{
    use HasFactory;
    
    protected $fillable = ['update_id', 'image_path', 'video_path'];
}
