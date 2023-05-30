<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{

    public function parts(){
        $parts = Part::all();
        return view('part', ['parts'=> $parts]);

    }

    public function create_part(Request $request){
        $part = new Part();
        $part->draft = $request->input('draft');
        $part->name = $request->input('name');
        $part->provider = $request->input('provider');
        $part->value = $request->input('value');
        $part->save();
        return redirect()->route('parts');

    }

    public function update_part($id, Request $request){
        $data = $request->except('_token', '_method');
        $part = Part::find($id);
        $part->update($data);
        return redirect()->route('parts');
    }

    public function edit_part($id){
        $part = Part::find($id);
        return view('edit_part', ['part' => $part]);
    }

    public function destroy_part($id){
        $part = Part::find($id);
        $part->delete();
        return redirect()->route('parts');
    }

}
