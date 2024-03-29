<?php

namespace App\Http\Controllers\Home;

use App\Models\Level;
use App\Helpers\BaseResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\LevelResource;

class LevelController extends Controller
{
    public function showLevelActivities($id)
    {
        $level= Level::with("activities")->find($id)->activities;
        return BaseResponse::MakeResponse(["levelActivities"=>LevelResource::collection($level)],true,["successMessage"=>200]);
    }
    public function getLevelScore($id)
    {
        $level =DB::table("level_scores")->where("level_id",$id)->
        where("user_id",auth()->user()->id)->pluck("score")->first();
        if($level == null)
        {
            $level=0;
        }
        return BaseResponse::MakeResponse(["levelScore"=>$level],true,["successMessage"=>200]);
    }

    public function getLevelStatus($id)
    {
        $levelStatus=DB::table("level_scores")->where("level_id",$id)->
        where("user_id",auth()->user()->id)->pluck("unlocked")->first();
        $levelStatus = (bool) $levelStatus;
        if($id == 1)
        {
            return BaseResponse::MakeResponse(["unlocked"=>true],true,["successMessage"=>200]);
        }
        if($id != 1 && $levelStatus == null )
        {
            $levelStatus=false;
            return BaseResponse::MakeResponse(["unlocked"=>$levelStatus],true,["successMessage"=>200]);
        }
        return BaseResponse::MakeResponse(["unlocked"=>$levelStatus],true,["successMessage"=>200]);

    }
}
