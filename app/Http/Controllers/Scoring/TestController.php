<?php

namespace App\Http\Controllers\Scoring;

use App\Helpers\BaseResponse;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function storeTestResult(Request $request)
    {
        $user=Auth::user();
        Profile::updateOrCreate(
            [
                "user_id"=>auth()->user()->id
            ],
            [
                "user_id"=>auth()->user()->id,
                "testScore"=>$request->score
            ]
        );
        return BaseResponse::MakeResponse(null,true,["message"=>"تم تسجيل النتيجه بنجاح"]);
    }
    public function getTestResult(Request $request)
    {
        $profile=Profile::where("user_id",auth()->user()->id)->first();
        return BaseResponse::MakeResponse($profile->testScore,true,["message"=>"test Score"]);
    }
}
