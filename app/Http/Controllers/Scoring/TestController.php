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
                "user_id"=>$user->id
            ],
            [
                "user_id"=>$user->id,
                "isPatient"=>$request->score
            ]
        );
        return BaseResponse::MakeResponse(null,true,["successMessage"=>200]);
    }
    public function getTestResult()
    {
        $profile=Profile::where("user_id",auth()->user()->id)->first();
        return BaseResponse::MakeResponse(["isPatient"=>$profile->isPatient],true,["successMessage"=>200]);
    }
}
