<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;

class AdsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get()
    {
        return Ads::with('category')->get();
    }

    public function saveInterest($catID, Request $request)
    {
        $id = Auth::id();
        $interest = Interest::where('category_id', $catID)->where('user_id', $id)->first();
        if ($interest != null) {
            $interest->interest = $request->input('interest');
            $interest->save();
        }else{
            $interest = new Interest();
            $interest->user_id = $id;
            $interest->category_id = $catID;
            $interest->interest = $request->input('interest');
            $interest->save();
        }
    }

    public function displayAd()
    {
        $id = Auth::id();
        return Interest::select('interest', 'id', 'user_id', 'category_id')->where('user_id', $id)->with('ads')->orderBy('interest', 'desc')->take(3)->get();
    }
}
