<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showActivity($id)
    {
        // $activity= Activity::where('id',$id)->pluck("description")->first();
        // return response()->json(["description"=>$activity]);

        $activity= Activity::where('id',$id)->first();
        return new ActivityResource($activity);
    }
}
