<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $data=User::where("id",auth()->user()->id)->first();
        $userData=$data->profile->totalScore;
        return response()->json([$data,$userData]);
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            "oldPassword"=>["required", "string"],
            "newPassword"=>["required", "confirmed","string"]
        ]);
        $user=User::find(Auth::user()->id);

        if(!Hash::check($request->oldPassword, $user->password))
        {
            return response()->json(["message"=>"Old password is incorrect"],401);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return response()->json(["message"=>"Password changed successfully"],200);
    }
    public function getTestScore()
    {
        $testScore=Profile::where("user_id",auth()->user()->id)->pluck("testScore")->first();
        return response()->json(["test Score"=>$testScore,"Status"=>200]);
    }
    public function getTotalScore()
    {
        $totalScore=Profile::where("user_id",auth()->user()->id)->pluck("totalScore")->first();
        return response()->json(["totalScore" => $totalScore]);
    }
}
