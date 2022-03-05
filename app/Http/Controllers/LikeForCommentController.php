<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\LikeForComment;
use App\Models\Comment;

class LikeForCommentController extends Controller
{
    public function store($commentId) {
        $comment = Comment::find($commentId);
        if(Auth::check() && (Auth::user()->id !== $comment->user_id)){
            $created = null;
            if($comment->hasLiked()){
                $comment->getLike()->delete();
            }
            else {
                $created = LikeForComment::create([
                    'comment_id' => $commentId,
                    'user_id' => Auth::user()->id,
                ]);
            }
            
            //check if request comes via ajax?
            if (request()->ajax()) {
                return ['likesCount' => $comment->likesCount(), 'created' => $created];
            }
        }
    }
}
