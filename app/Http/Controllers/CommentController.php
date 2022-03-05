<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;

class CommentController extends Controller
{
    
    public function index() {
        $title = 'Users Comments';
        $menuName = 'platform';
        $comments = Comment::paginate(15);
        return view('platform.comments', compact('comments', 'title', 'menuName'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if(Auth::check()){
            $request->validate([
                'body' => 'required|string',
                'campaign_id' => 'required|integer',
                'parent_id' => 'nullable|integer',
            ]);

            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            Comment::create($input);
        }
        return back();
    }
    
    /*
     * updates a comments status of like is_enabled
     */
    public function update($id) {
        Comment::find($id)->update(['is_enabled' => '1']);
        return back();
    }
    
    public function destroy($id) {
        Comment::find($id)->delete();
        return back();
    }
    
}
