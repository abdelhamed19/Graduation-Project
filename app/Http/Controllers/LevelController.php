<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Score;
use App\Models\LevelScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LevelController extends Controller
{
    public function showLevelActivities($id)
    {
        $level= Level::with("activities")->find($id)->activities;
        //$types = $level->activities->pluck('type');
        return response()->json(["Activities"=> $level]);
    }
    public function getLevelScore($id)
    {
        $level =DB::table("level_scores")->where("level_id",$id)->
        where("user_id",auth()->user()->id)->pluck("score")->first();
        if($level == null)
        {
            $level=0;
        }
        return response()->json(["Level Score" => $level]);
    }

    public function getLevelStatus($id)
    {
        $levelStatus=DB::table("level_scores")->where("level_id",$id)->
        where("user_id",auth()->user()->id)->pluck("unlocked")->first();
        if($levelStatus == null)
        {
            $levelStatus=0;
        }
        return response()->json(["Unlocked" => $levelStatus]);
    }
}
