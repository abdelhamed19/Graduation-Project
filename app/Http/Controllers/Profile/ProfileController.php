<?php

namespace App\Http\Controllers\Profile;

use App\Http\Resources\UserResource;
use App\Models\{User,Profile};
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassword;

class ProfileController extends Controller
{
    public function profile()
    {
        $data=User::with("profile")->where("id",auth()->user()->id)->first();
        $user=new UserResource($data);
        return BaseResponse::MakeResponse(["profile"=>$user],true,["successMessage"=>200]);
    }
    public function changePassword(ChangePassword $request)
    {

        $user=User::find(auth()->user()->id);
        if(!Hash::check($request->oldPassword, $user->password))
        {
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>" كلمات المرور القديمه غير صحيحه"]);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return BaseResponse::MakeResponse(null,true,["successMessage"=>" تم تغيير كلمة المرور بنجاح "]);
    }
    public function getTotalScore()
    {
        $totalScore=Profile::where("user_id",auth()->user()->id)->pluck("totalScore")->first();
        if($totalScore==null)
        {
            $totalScore=0;
        }
        return BaseResponse::MakeResponse(["totalScore"=>$totalScore],true,["successMessage"=>200]);
    }
}
