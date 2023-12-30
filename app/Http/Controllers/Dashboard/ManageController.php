<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Level;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    public function addLevel(Request $request)
    {
        Level::create([
            "name"=>$request->name,
            "unlocked"=>$request->unlocked
        ]);
        return response()->json(["Level Created Success"]);
    }
    public function addActivity(Request $request)
    {
        Activity::create([
            "level_id"=>$request->level_id,
            "title"=>$request->title,
            "description"=>$request->description,
            "type"=>$request->type
        ]);
        return response()->json(["Activity Created Success"]);
    }
}
