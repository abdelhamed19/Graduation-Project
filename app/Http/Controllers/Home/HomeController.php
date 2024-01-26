<?php

namespace App\Http\Controllers\Home;

use App\Helpers\BaseResponse;
use App\Models\{Level,Profile};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $levels= Level::all()->pluck("name");
        return BaseResponse::MakeResponse($levels,true,"Levels");
    }
    public function getUserData()
    {
        $username=auth()->user()->name;
        $totalScore=Profile::where("user_id",auth()->user()->id)->pluck("totalScore")->first();
        if(!$totalScore)
        {
            $totalScore=0;
        }
        return BaseResponse::MakeResponse([$username, $totalScore],true,["message"=>"Levels"]);
    }

}
