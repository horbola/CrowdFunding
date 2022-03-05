<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function campaign(){
    	return $this->belongsTo('App\Campaign');
    }

    public function replies()
	{
	    return $this->hasMany('App\Comment', 'comment_id');
	}
}
