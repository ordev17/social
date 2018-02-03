<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Follower;

class FollowersControler extends Controller
{
    public function follow($id){
        $user= User::find($id);
        $follower= new Follower;
        $follower->user_id=Auth::user()->id;
        $follower->user=$id;
        $follower->save();
        return "ok";
        
    }
}
