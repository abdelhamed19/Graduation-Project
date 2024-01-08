<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        User::rules($request);
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
        return response()->json(['token' => $token,"user-info"=>$user], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            "email"=>["required", "email"],
            "password" => ["required","string"]
        ]);
        $user=User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return response()->json(["message"=>"Invalid Credentials"],401);
        }
        $token = $user->createToken('RegisterToken')->plainTextToken;
        return response()->json(['token' => $token,"value"=>$user,"status"=> 201,"message"=>"Successfully login"]);
    }
    public function logout(User $user)
    {
        $user->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }

}
