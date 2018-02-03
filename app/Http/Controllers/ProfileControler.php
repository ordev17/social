<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use Auth;
class ProfileControler extends Controller
{
    public function profile ($username){
        $user= User::where('username',$username)->first();
        $follower= Follower::where('user',Auth::user()->id)->get();
        return view('user.profile',compact('user','follower'));
    }
}
