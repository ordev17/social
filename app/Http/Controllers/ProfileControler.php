<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileControler extends Controller
{
    public function profile ($username){
        $user= User::where('username',$username)->first();
        return view('user.profile',compact('user'));
    }
}
