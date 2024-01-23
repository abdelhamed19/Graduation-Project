<?php

namespace App\Http\Controllers\Profile;

use App\Helpers\BaseResponse;
use App\Models\User;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
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
       return BaseResponse::MakeResponse(["token"=>$token],true,["success message"=>"Registration done"]);
    }

    public function login(LoginRequest $request)
    {
        $user=User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return BaseResponse::MakeResponse(null,false,["Error message"=>" البريد الإلكتروني أو كلمة المرور غير صحيحه"]);
        }
        $token = $user->createToken('RegisterToken')->plainTextToken;
        return BaseResponse::MakeResponse(["token"=>$token],true,["success message"=>"Login success"]);
    }
    public function logout(User $user)
    {
        $user->tokens()->delete();
        return BaseResponse::MakeResponse(null,false,["success message"=>"Logout success"]);
    }

}
