<?php

namespace App\Http\Controllers\Home;

use App\Models\{Score,Activity};
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;

class ActivityController extends Controller
{

    public function showActivity($id)
    {
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
        return BaseResponse::MakeResponse($activity,true,["message"=>"Completed Activities"]);
    }
    public function getInCompletedActivities()
    {
        $totalActivity= Activity::all()->count();
        $completeActivity=Score::where("user_id",auth()->user()->id)->get()->count();
        $IncompleteActivity=$totalActivity-$completeActivity;
        return response()->json(["In complete Activity"=>$IncompleteActivity]);
    }
    public function getMentalCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $mentalActivity=Activity::whereIn("id",$activity)->where("type","mental")->count();
        return BaseResponse::MakeResponse($mentalActivity,true,["Message"=>"Completed Mental Activities"]);
    }
    public function getSocialCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $socialActivity=Activity::whereIn("id",$activity)->where("type","social")->count();
        return BaseResponse::MakeResponse($socialActivity,true,["Message"=>"Completed Social Activities"]);
    }
    public function getPhysicalCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $physicalActivity=Activity::whereIn("id",$activity)->where("type","physical")->count();
        return BaseResponse::MakeResponse($physicalActivity,true,["Message"=>"Completed Physical Activities"]);
    }
    public function getEmotionalCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $emotionalActivity=Activity::whereIn("id",$activity)->where("type","emotional")->count();
        return BaseResponse::MakeResponse($emotionalActivity,true,["Message"=>"Completed Emotional Activities"]);
    }
}
