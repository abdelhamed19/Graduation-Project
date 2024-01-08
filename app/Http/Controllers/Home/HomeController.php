<?php

namespace App\Http\Controllers\Home;

use App\Models\Level;
use App\Models\Profile;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $levels= Level::all();
        return response()->json(["levels" => $levels]);
    }
    public function getUserData()
    {
        $username=auth()->user()->name;
        $totalScore=Profile::where("user_id",auth()->user()->id)->pluck("totalScore")->first();
        return response()->json(["username" => $username,"totalScore" => $totalScore]);
    }

}
