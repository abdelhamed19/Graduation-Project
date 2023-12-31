<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Profile;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function storeResult(Request $request,$id)
    {
        $activity=Activity::find($id);
        Score::updateOrCreate(
            [
                "user_id"=>auth()->user()->id,
                "activity_id"=>$id
            ],
            [
                 "user_id" =>auth()->user()->id,
                 "activity_id"=>$id,
                 "level_id"=>$activity->level_id,
                 "activityScore"=> $request->score
            ]
        );
        $this->updateTotalScore();
        $this->updateLevelScore($activity->level_id);
        $this->updateLevelStatus($activity->level_id);
        return response()->json(["message"=>"Great Efforts","status"=>200]);
    }

    public function updateTotalScore()
    {
        $score=Score::where("user_id",auth()->user()->id)->pluck("activityScore")->toArray();
        $sum=array_sum($score);
        Profile::updateOrCreate(
            [
                "user_id"=>auth()->user()->id
            ],
            [
                "user_id"=>auth()->user()->id,
                "totalScore"=>$sum
            ]
        );
    }

    public function updateLevelScore($id)
    {
        $score=Score::where('level_id',$id)->where('user_id', auth()->user()->id)->pluck("activityScore")->toArray();
        $score=array_sum($score);   // return score

        $filteredRecords = DB::table('level_scores')->where('user_id', auth()->user()->id)
        ->where("level_id",$id)->first();

        if(!$filteredRecords)
        {
            DB::table('level_scores')->insert([
                "user_id" =>auth()->user()->id,
                "level_id"=>$id,
                "score"=>$score]);
        }
        else{
        DB::table('level_scores')->where('user_id', auth()->user()->id)
        ->where("level_id",$id)->update([
            "score"=>$score
        ]);
        }

    }

    public function updateLevelStatus($id)
    {
        $filteredRecords = DB::table('level_scores')->where('user_id', auth()->user()->id)
        ->where("level_id",$id)->first();

        if($filteredRecords->score >= 3)
        {
            DB::table('level_scores')->where('user_id', auth()->user()->id)
            ->where("level_id",$id)->update(["unlocked"=>true]);
        }
        else{
            DB::table('level_scores')->where('user_id', auth()->user()->id)
            ->where("level_id",$id)->update(["unlocked"=>false]);
        }
    }
}
