<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'parent_id', 'body'];



    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
