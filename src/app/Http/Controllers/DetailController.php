<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

class DetailController extends Controller
{
    public function show_detail(){
        $details = Detail::all();
        $categories = Category::all();
        $user = User::all();
//        dd($category);
        return view('detail', ['details'=>$details, 'categories'=> $categories, 'user'=>$user]);
    }

    public function create(Request $request){
        $request->except('_token', 'category');
        $detail = new Detail();
//        $detail->create($data);
        $detail->title = $request->input('title');
        $detail->state = $request->input('state');
        $detail->secured = $request->input('secured');
        $detail->order = $request->input('order');
        $detail->category_id = $request->input('category');
        $detail->save();
        return redirect()->route('show_detail');
    }

    public function edit_detail($id){
        $detail = Detail::find($id);
        return view('edit_detail', ['detail'=>$detail]);
    }
    public function update_detail($id, Request $request){
        $data = $request->except('_token', '_method');
        $detail = Detail::find($id);
//        dd($detail);
        $detail->update($data);
        return redirect()->route('show_detail');
    }

    public function destroy_detail($id){
        $detail = Detail::find($id);
        $detail->delete();
        return redirect()->route('show_detail');
    }
}
