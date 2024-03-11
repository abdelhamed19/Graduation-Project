<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{Role,User};
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index()
    {
            $roles=Role::all();
            return BaseResponse::MakeResponse($roles,true,["successMessage"=>"Roles Fetched successfully"]);
    }
    public function addNewRole(Request $request, RoleRequest $roleRequest)
    {
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
        $role=Role::findOrFail($id);
        if($role->role=="super-admin"){
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"You are not allowed to delete this role"]);
        }
        $role->delete();
        return BaseResponse::MakeResponse(null,true,["successMessage"=>"Role Deleted successfully"]);
    }
}
