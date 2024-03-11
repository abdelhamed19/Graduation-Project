<?php

namespace App\Http\Controllers\Profile;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Models\{Role,User,Profile, Tracking};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\{UserRequest,LoginRequest};
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create(
            [
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "image"=> "public/assets/images/default.jpg"
            ]
        );
        $token = $user->createToken('RegisterToken')->plainTextToken;
        Profile::create(["user_id" => $user->id]);
        Status::create([
        "user_id" => $user->id,
        "level_id" => 1,
        "score" => 0,
        "unlocked" => 1,
        ]);
       return BaseResponse::MakeResponse(["token"=>$token],true,["successMessage"=>200]);
    }

    public function login(LoginRequest $request)
    {
        $user=User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>" البريد الإلكتروني أو كلمة المرور غير صحيحه"]);
        }
        if ($user->role->role == null)
        {
            $user->trackings()->create([
                'login_date' => now(),
                'login_time' => now(),
            ]);
        }
        $token = $user->createToken('RegisterToken')->plainTextToken;
        return BaseResponse::MakeResponse(["token"=>$token,"role"=>$user->role->role],true,["successMessage"=>200]);
    }
    public function logout(Request $request)
    {
        $user=Auth::user();
        $track=Tracking::where('user_id',$user->id)->orderBy("login_time","desc")->first();
        $track->update([
            'logout_date' => now(),
            'logout_time' => now(),
        ]);
        $user->tokens()->delete();
        return BaseResponse::MakeResponse(null,true,["successMessage"=>200]);
    }

}
