<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;

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
}
