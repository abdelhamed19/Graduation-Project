<?php

namespace App\Http\Controllers\Writings;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;

class TasksController extends Controller
{
    public function show($created_at)
    {
        $tasks = Task::where("user_id",auth()->user()->id)->whereDate("created_at",$created_at)->get();
        if($tasks->count() > 0)
        {
            return BaseResponse::MakeResponse(["tasks"=>TaskResource::collection($tasks)],true,["success message"=>200]);
        }
            return BaseResponse::MakeResponse(null,true,["error message"=>"لا يوجد قائمه بهذا التاريخ"]);
    }
    public function store(Request $request)
    {
         $request->validate([
             "body"=>["required"]
         ]);
        Task::create([
            "user_id"=>auth()->user()->id,
            "body"=>json_decode($request->body)
        ]);
        return BaseResponse::MakeResponse(null,true,["success message"=>"تم تسجيل القائمه بنجاح"]);
    }

}
