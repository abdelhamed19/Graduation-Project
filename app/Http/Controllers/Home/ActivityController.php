<?php

namespace App\Http\Controllers\Home;

use App\Models\Score;
use App\Models\Activity;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;

class ActivityController extends Controller
{
    public function showActivity($id)
    {
        // $activity= Activity::where('id',$id)->pluck("description")->first();
        // return response()->json(["description"=>$activity]);

        $activity= Activity::where('id',$id)->first();
        return new ActivityResource($activity);
    }
    public function getTotalActivities()
    {
        $activity= Activity::all()->count();
        return response()->json(["activities number"=>$activity]);
    }
    public function getCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->get()->count();
        return response()->json(["CompletedActivities"=>$activity]);
    }
    public function getInCompletedActivities()
    {
        $totalActivity= Activity::all()->count();
        $completeActivity=Score::where("user_id",auth()->user()->id)->get()->count();
        $IncompleteActivity=$totalActivity-$completeActivity;
        return response()->json(["In complete Activity"=>$IncompleteActivity]);
    }
}
