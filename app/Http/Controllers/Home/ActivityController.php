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
        return BaseResponse::MakeResponse(["activity"=>ActivityResource::collection($activity)],true,["success message"=>200]);
    }
    public function getTotalActivities()
    {
        $activity= Activity::all()->count();
        return BaseResponse::MakeResponse(["total activities"=>$activity],true,["success message"=>200]);
    }
    public function getCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->get()->count();
        return BaseResponse::MakeResponse(["Completed Activities"=>$activity],true,["success message"=>200]);
    }
    public function getInCompletedActivities()
    {
        $totalActivity= Activity::all()->count();
        $completeActivity=Score::where("user_id",auth()->user()->id)->get()->count();
        $IncompleteActivity=$totalActivity-$completeActivity;
        return BaseResponse::MakeResponse(["In complete Activity"=>$IncompleteActivity],true,["success message"=>200]);
    }
    public function getMentalCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $mentalActivity=Activity::whereIn("id",$activity)->where("type","mental")->count();
        return BaseResponse::MakeResponse(["Completed Mental Activities"=>$mentalActivity],true,["success Message"=>200]);
    }
    public function getSocialCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $socialActivity=Activity::whereIn("id",$activity)->where("type","social")->count();
        return BaseResponse::MakeResponse(["Completed Social Activities"=>$socialActivity],true,["success Message"=>200]);
    }
    public function getPhysicalCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $physicalActivity=Activity::whereIn("id",$activity)->where("type","physical")->count();
        return BaseResponse::MakeResponse(["Completed Physical Activities"=>$physicalActivity],true,["success Message"=>200]);
    }
    public function getEmotionalCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->pluck("activity_id");
        $emotionalActivity=Activity::whereIn("id",$activity)->where("type","emotional")->count();
        return BaseResponse::MakeResponse(["Completed Emotional Activities"=>$emotionalActivity],true,["success Message"=>200]);
    }
}
