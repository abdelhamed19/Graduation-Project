<?php

namespace App\Http\Controllers\Home;

use App\Helpers\BaseResponse;
use App\Models\{Score,Activity};
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;

class ActivityController extends Controller
{

    public function showActivity($id)
    {
        $activity= Activity::where('id',$id)->first();
        return BaseResponse::MakeResponse(["activity"=>new ActivityResource($activity)],true,["successMessage"=>200]);
    }
    public function getTotalActivities()
    {
        $activity= Activity::all()->count();
        return BaseResponse::MakeResponse(["total activities"=>$activity],true,["successMessage"=>200]);
    }
    public function getCompletedActivities()
    {
        $activity=Score::where("user_id",auth()->user()->id)->get()->count();
        return BaseResponse::MakeResponse(["Completed Activities"=>$activity],true,["successMessage"=>200]);
    }
    public function getInCompletedActivities()
    {
        $totalActivity= Activity::all()->count();
        $completeActivity=Score::where("user_id",auth()->user()->id)->get()->count();
        $IncompleteActivity=$totalActivity-$completeActivity;
        return BaseResponse::MakeResponse(["In complete Activity"=>$IncompleteActivity],true,["successMessage"=>200]);
    }
    public function typeOfCompletedActivities()
    {
        $types=["mental"=>"mental","social"=>"social","emotional"=>"emotional","physical"=>"physical"];
        foreach($types as $key => $value)
        {
            $mentalActivity[$key]=Score::type($value);
        }
        return BaseResponse::MakeResponse(["activities"=>$mentalActivity],true,["successMessage"=>200]);
    }

}
