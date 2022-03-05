<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Lib\Helper;


class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'campaign_id', 'parent_id', 'is_enabled', 'body'];
    
    
    

    public function campaign() {
        return $this->belongsTo(Campaign::class);
    }

    public function replies() {
        // return $this->hasMany(Comment::class, 'parent_id')->orderBy('created_at', 'desc');
        return $this->hasMany(Comment::class, 'parent_id')
                ->orderBy('created_at','DESC')
                ->skip(0)
                ->take(3);
    }
    
    public function repliesTotal() {
        return $this->hasMany(Comment::class, 'parent_id')->get()->count();
    }
    
    public function likesForComment() {
        return $this->hasMany(LikeForComment::class);
    }
    
    /*
     * counts total number of like for this comment.
     */
    public function likesCount() {
        return $this->likesForComment()->get()->count();
    }
    
    public function getLike() {
        if(Auth::check()){
            return $this->likesForComment()->whereUserId(Auth::user()->id);
        }
        else return 0;
    }
    
    public function hasLiked() {
        if($this->getLike()){
            return $this->getLike()->count();
        }
        else return 0;
    }
    
    public function commentor() {
        // User::find($this->user_id);
        return $this->belongsTo(User::class, 'user_id');
    }
    
    /*
     * return string representation of the status of this campaign
     */
    public function isShowing() {
        if($this->is_enabled)
            return 'Showing';
        else return 'Pending';
    }
    
}
