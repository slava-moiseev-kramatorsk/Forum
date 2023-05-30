<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
//      dd(4);
        $comment = Comment::all();
        return view('show',['comment' => $comment]);

    }
    public function create(CommentRequest $request){
        $comment = new Comment();
        $comment->name = $request->input('user_name');;
        $comment->forum_id = $request->input('forum_id');
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->route('index');
    }


}
