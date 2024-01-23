<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use App\Models\Profile;
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;

class ProfileController extends Controller
{
    public function profile()
    {
        $data=User::where("id",auth()->user()->id)->first();
        $ProfileTotalScore=Profile::where("id",auth()->user()->id)->pluck("totalScore");
        return BaseResponse::MakeResponse(["user-data"=>$data,"totalScore"=>$ProfileTotalScore,],true,["success code"=>200]);
    }
    public function changePassword(ChangePassword $request)
    {

        $user=User::find(Auth::user()->id);
        if(!Hash::check($request->oldPassword, $user->password))
        {
            return BaseResponse::MakeResponse(null,false,["Error message"=>" كلمات المرور القديمه غير صحيحه"]);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return BaseResponse::MakeResponse(null,true,["success message"=>" تم تغيير كلمة المرور بنجاح "]);
    }
    public function getTestScore()
    {
        $testScore=Profile::where("user_id",auth()->user()->id)->pluck("testScore")->first();
        return BaseResponse::MakeResponse(["test Score"=>$testScore],true,["success code"=>200]);
    }
    public function getTotalScore()
    {
        $totalScore=Profile::where("user_id",auth()->user()->id)->pluck("totalScore")->first();
        return BaseResponse::MakeResponse(["Total Score"=>$totalScore],true,["success message"=>200]);
    }
}
