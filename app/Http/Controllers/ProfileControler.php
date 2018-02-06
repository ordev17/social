<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follower;
use App\Message;
use Auth;

class ProfileControler extends Controller
{
    public function profile($username)
    {
        $user = User::where('username', $username)->first();
        $follower = Follower::where('user_id', Auth::user()->id)->get();


        return view('user.profile', compact('user', 'follower'));
    }

    public function inbox()
    {
        $message = Message::where('reciver', Auth::user()->id)
                ->where('seen', false)
                ->orderBy('created_at', 'DESC')
                ->get();

        return view('user.inbox')->with('messages', $message);
    }

    public function reactions()
    {
        $message = Message::where('user_id', Auth::user()->id)
                ->whereNotNull('reaction')
                ->orderBy('created_at', 'DESC')
                ->get();

        return view('user.reactions')->with('messages', $message);
    }

    public function message(Request $request)
    {

        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->reciver = $request->input('id');
        $message->content = $request->input('mess');
        $message->save();
        return redirect('/posts')->with('status', 'Message Sent!');
        
    }

    public function messageReaction(Message $message, Request $request)
    {
        if ($message->getOriginal('reaction') == null){
            $message->reaction = $request->input('reaction');
            $message->save();
        }
        return 'ok';
    }
    
    
    public function search(Request $request){
        
        $users=User::where('username', 'like', '%' . $request->input('search') . '%')->get();
        return view('user.results')->with('users', $users);
        
    }

}
