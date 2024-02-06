<?php

namespace App\Http\Controllers\Home;

use App\Helpers\BaseResponse;
use App\Models\{Level,Profile};
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $levels= Level::with(["status"=>function($query){
            $query->where("user_id",auth()->user()->id);
        }])->get();
        foreach($levels as $level)
        {
            if($level->status->isEmpty())
            {
                $status=[
                    "score"=>0,
                    "unlocked"=>0
                ];
                $level->status->push($status);
            }
        }

        return BaseResponse::MakeResponse($levels,true,["successMessage"=>200]);
    }
    public function getUserData()
    {
        $username=auth()->user()->name;
        $totalScore=Profile::where("user_id",auth()->user()->id)->pluck("totalScore")->first();
        if(!$totalScore)
        {
            $totalScore=0;
        }
        return BaseResponse::MakeResponse(["username"=>$username,"totalScore"=> $totalScore],true,["successMessage"=>200]);
    }
}
