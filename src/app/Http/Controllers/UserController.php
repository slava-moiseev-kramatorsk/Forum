<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function new_user(Request $req){
        $user = new User();
        $user->name = $req->input('user_name');
        $user->password = $req->input('password');
        $user->email = $req->input('email');
        $user->save();
    return view('welcome');
    }
    public function registration(){
        return view('registration');
    }

    public function show($id){
        $user = User::find($id);
        return view('user-profile', ['user' => $user]);
    }
}
