<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Detail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function show_category($id){
    $category = Category::find($id);
    $details = Detail::all();
    return view('show_category', ['category'=> $category, 'details' => $details]);
}
}
