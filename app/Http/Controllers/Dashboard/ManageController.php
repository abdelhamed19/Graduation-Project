<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\{Level,Activity};
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    protected $roles=["super-admin"];

    public function addLevel(Request $request)
    {
        $user=Auth()->user()->role->role;
        if(!in_array($user,$this->roles)){
            return BaseResponse::MakeResponse(null,false,"You are not allowed to do this, Only Super-Admins can do this");
        }
        Level::create([
            "name"=>$request->name,
        ]);
        return BaseResponse::MakeResponse(null,true,"Level Created successfully");
    }
    public function addActivity(Request $request)
    {
        $user=Auth()->user()->role->role;
        if(!in_array($user,$this->roles)){
            return BaseResponse::MakeResponse(null,false,"You are not allowed to do this, Only Super-Admins can do this");
        }
        Activity::create([
            "level_id"=>$request->level_id,
            "title"=>$request->title,
            "description"=>explode(" ",$request->description),
            "type"=>$request->type
        ]);
        return BaseResponse::MakeResponse(null,true,"Activity Created successfully");
    }
    public function deleteActivity($id)
    {
        $user=Auth()->user()->role->role;
        $activity=Activity::find($id);
        if(!$activity){
            return BaseResponse::MakeResponse(null,false,"Activity Not Found");
        }
        if($activity && !in_array($user,$this->roles)){
            return BaseResponse::MakeResponse(null,false,"You are not allowed to do this, Only Super-Admins can do this");
        }
        $activity->delete();
        return BaseResponse::MakeResponse(null,true,"Activity Deleted successfully");
    }
    public function deleteLevel($id)
    {
        $user=Auth()->user()->role->role;
        $level=Level::find($id);
        if(!$level){
            return BaseResponse::MakeResponse(null,false,"Level Not Found");
        }

        if($level && !in_array($user,$this->roles)){
            return BaseResponse::MakeResponse(null,false,"You are not allowed to do this, Only Super-Admins can do this");
        }
        $level->delete();
        return BaseResponse::MakeResponse(null,true,"Level Deleted successfully");
    }
}
