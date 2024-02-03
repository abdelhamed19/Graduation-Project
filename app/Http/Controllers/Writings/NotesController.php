<?php

namespace App\Http\Controllers\Writings;

use App\Models\Writing;
use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotesResource;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes=Auth::user()->writings;
        if($notes->count()==0)
        {
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>"لا يوجد ملاحظات"]);
        }
        return BaseResponse::MakeResponse(["notes"=>NotesResource::collection($notes)],true,["successMessage"=>200]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "body"=>["required","string"]
        ]);

        Writing::create([
            "user_id"=>auth()->user()->id,
            "body"=>$request->body
        ]);
        return BaseResponse::MakeResponse(null,true,["successMessage"=>200]);
    }

    /**
     * Display the specified resource.
     */
    public function show ($id)
    {
        $writing=Writing::find($id);
        if($writing && $writing->user_id==auth()->user()->id)
        {
            return BaseResponse::MakeResponse(["note"=>$writing->body],true,["successMessage"=>200]);
        }
        return BaseResponse::MakeResponse(null,false,["errorMessage"=>404]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note=Writing::find($id);
        if($note && $note->user_id==auth()->user()->id)
        {
            $note->update([
                "body"=>$request->body
            ]);
            return BaseResponse::MakeResponse(null,true,["successMessage"=> 200]);
        }
            return BaseResponse::MakeResponse(null,false,["errorMessage"=>404]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note=Writing::find($id);
        if($note && $note->user_id==auth()->user()->id)
        {
            $note->delete();
            return BaseResponse::MakeResponse(null,true,["successMessage"=> 200]);
        }
        return BaseResponse::MakeResponse(null, false,["errorMessage"=>404]);
    }
}
