<?php
namespace App\Helpers;

use App\Models\Score;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

Class callbacks
{
    public static function updateTotalScore()
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
    public static function updateLevelScore($id)
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
    public static function updateLevelStatus($id)
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
