<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{Role,User};
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    protected $roles=["super-admin"];
    public function addNewRole(Request $request, RoleRequest $roleRequest)
    {
        $admin=auth()->user()->role->role;
        if(!in_array($admin,$this->roles)){
            return BaseResponse::MakeResponse(null,false,"You are not allowed to do this, Only Super-Admins can do this");
        }

        $user=User::where("email",$request->email)->first();
        if(!$user){
            return BaseResponse::MakeResponse(null,false,"User Not Found");
        }
        Role::updateOrCreate(
            ['user_id' => $user->id],
            [
                "role" => $roleRequest->role,
                "username" => $user->name
            ]
        );
        return BaseResponse::MakeResponse(null,true,"Role Created successfully");
    }
    public function updateRole(RoleRequest $request)
    {
        $admin=auth()->user()->role->role;
        if(!in_array($admin,$this->roles)){
            return BaseResponse::MakeResponse(null,false,"You are not allowed to do this, Only Super-Admins can do this");
        }

        $user=User::where("email",$request->email)->first();
        if(!$user){
            return BaseResponse::MakeResponse(null,false,"User Not Found");
        }
         $user->role()->update([
            "user_id"=>$user->id,
            "username"=>$user->name,
            "role"=>$request->role
        ]);
        return BaseResponse::MakeResponse(null,true,"Role Updated successfully");
    }
}
