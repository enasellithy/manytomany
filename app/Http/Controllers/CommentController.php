<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->Validate($request,[ 
            'name' => 'required',
            'comment' => 'required|max:255'
            ]);
        $post = Post::all();
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->name = $request['name'];
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect()->back();
    }
}
