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
    public function index()
    {
        $admin=auth()->user()->role->role;
        if($admin=="admin" || $admin=="super-admin"){
            $roles=Role::all();
            return BaseResponse::MakeResponse($roles,true,["successMessage"=>"Roles Fetched successfully"]);
        }
        return BaseResponse::MakeResponse(null,false,["errorMessage"=>"You are not allowed to do this, Only Super-Admins can do this"]);
    }
    public function addNewRole(Request $request, RoleRequest $roleRequest)
    {
        $admin=auth()->user()->role->role;
        if(!in_array($admin,$this->roles)){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"You are not allowed to do this, Only Super-Admins can do this"]);
        }

        $user=User::where("email",$request->email)->first();
        if(!$user){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"User Not Found"]);
        }
        Role::updateOrCreate(
            ['user_id' => $user->id],
            [
                "role" => $roleRequest->role,
                "username" => $user->name
            ]
        );
        return BaseResponse::MakeResponse(null,true,["successMessage"=>"Role Created successfully"]);
    }
    public function updateRole(RoleRequest $request)
    {
        $admin=auth()->user()->role->role;
        if(!in_array($admin,$this->roles)){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"You are not allowed to do this, Only Super-Admins can do this"]);
        }

        $user=User::where("email",$request->email)->first();
        if(!$user){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"User Not Found"]);
        }
         $user->role()->update([
            "user_id"=>$user->id,
            "username"=>$user->name,
            "role"=>$request->role
        ]);
        return BaseResponse::MakeResponse(null,true,["successMessage"=>"Role Updated successfully"]);
    }
    public function deleteRole($id)
    {
        $admin=auth()->user()->role->role;
        if(!in_array($admin,$this->roles)){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"You are not allowed to do this, Only Super-Admins can do this"]);
        }
        $role=Role::findOrFail($id);
        if($role->role=="super-admin"){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"You are not allowed to delete this role"]);
        }
        $role->delete();
        return BaseResponse::MakeResponse(null,true,["successMessage"=>"Role Deleted successfully"]);
    }
}
