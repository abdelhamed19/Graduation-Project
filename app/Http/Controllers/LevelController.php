<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $level =DB::table("_level_scores")->where("level_id",$id)->first();
        return response()->json(["Level Score" => $level]);
    }

    public function getLevelStatus($id)
    {
        $levelStatus=Level::where("id",$id)->pluck("unlocked")->first();
        return response()->json(["Unlocked" => $levelStatus]);
    }
}
