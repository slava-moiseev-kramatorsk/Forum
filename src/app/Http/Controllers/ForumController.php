<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\BaseController;
use App\Http\Requests\ForumRequest;
use App\Models\Comment;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Carbon;

class ForumController extends BaseController
{
    public function new_public(){
        $comment = Comment::all();
        $forums = Forum::query()->whereNotNull('published_at')->get();
        $user = User::all();
        return view('new_public',['forums' => $forums, 'comment' => $comment, 'user' => $user]);
    }
    public function pre_show($id){
        $forum = Forum::find($id);
        $comment = Comment::all();
        return view('pre_show',['forum' => $forum, 'comment' => $comment]);
    }
    public function public_theme($id){
        $now = Carbon::now();
        $forum = Forum::find($id);
        $forum->published_at = $now;
        $forum->update();
        return redirect()->route('new_public');
    }

    public function addTheme(){
        return view('addNewTheme');
    }

    public function create(ForumRequest $req){

      $this->service->create($req);
      return redirect()->route('index');
    }

    public function edit($id){

        $forum =Forum::find($id);
        return view('editForum',['forum' => $forum]);
    }

    public function update($id, ForumRequest $request){

        $this->service->update($id,$request);
        return redirect()->route('index');
    }

    public function index(){
      $comment = Comment::all();
      $forums = Forum::query()->whereNull('published_at')->get();
      $user = User::all();
      return view('welcome',['forums' => $forums, 'comment' => $comment, 'user' => $user]);


    }
    public function show($id){
      $forum = Forum::find($id);
      $comment = Comment::query()->whereNotNull('parent_id')->get();
      return view('show',['forum' => $forum, 'comment' => $comment]);

    }
    public function destroy($id){
        $forum = Forum::find($id);
        $forum->delete();
      return redirect()->route('index');

    }

}
