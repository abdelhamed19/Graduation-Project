<?php

namespace App\Http\Controllers\Scoring;

use App\Helpers\{BaseResponse, callbacks};
use App\Models\{Score,Activity};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
                 "activityScore"=> $request->score,
                "activityAnswers"=>$request->answer,
            ]
        );
        callbacks::updateTotalScore();
        callbacks::updateLevelScore($activity->level_id);
        callbacks::updateLevelStatus($activity->level_id);
        return BaseResponse::MakeResponse(null,true,["successMessage"=>200]);
    }

}
