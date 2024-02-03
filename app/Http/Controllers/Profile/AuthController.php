<?php

namespace App\Http\Controllers\Profile;

use App\Models\{Role,User,Profile};
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Requests\{UserRequest,LoginRequest};
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        Role::create([
        "user_id" => $user->id,
        "username"=>$user->name,
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
        $token = $user->createToken('RegisterToken')->plainTextToken;
        return BaseResponse::MakeResponse(["token"=>$token,"role"=>$user->role->role],true,["successMessage"=>200]);
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return BaseResponse::MakeResponse(null,true,["successMessage"=>200]);
    }

}
