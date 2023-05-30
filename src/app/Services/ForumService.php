<?php

namespace App\Services;

use App\Http\Requests\ForumRequest;
use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Support\Carbon;

class ForumService
{
 public function create(ForumRequest $req){
     $forum = new Forum();
     $forum->name = $req->input('name');
     $forum->content = $req->input('content');
     $forum->author = $req->input('author');
     $forum['image'] = $req->file('image')->store('public');
     $forum->save();
 }

 public function update($id, ForumRequest $request){

     $data = $request->except('_token', '_method');
     $forum = Forum::find($id);
     $forum->update($data);
 }

}
