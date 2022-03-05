<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Lib\Helper;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'parent_id', 'body'];

    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }

    public function replies() {
        // return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'desc');
        return $this->hasMany(Comment::class, 'parent_id')->latest();
    }
    
    public function commentor() {
        // User::find($this->user_id);
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
