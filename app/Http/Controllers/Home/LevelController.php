<?php

namespace App\Http\Controllers\Home;

use App\Models\Level;
use App\Helpers\BaseResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    public function showLevelActivities($id)
    {
        $level= Level::with("activities")->find($id)->activities;
        return BaseResponse::MakeResponse($level,true,"Level Activities");
    }
    public function getLevelScore($id)
    {
        $level =DB::table("level_scores")->where("level_id",$id)->
        where("user_id",auth()->user()->id)->pluck("score")->first();
        if($level == null)
        {
            $level=0;
        }
        return BaseResponse::MakeResponse($level,true,"Levels Score");
    }

    public function getLevelStatus($id)
    {
        $levelStatus=DB::table("level_scores")->where("level_id",$id)->
        where("user_id",auth()->user()->id)->pluck("unlocked")->first();
        if($levelStatus == null)
        {
            $levelStatus=false;
            return BaseResponse::MakeResponse(["unlocked"=>$levelStatus],true,"level Status");
        }
        return BaseResponse::MakeResponse(["unlocked"=>$levelStatus=true],true,"level Status");

    }
}
