<?php

namespace App\Http\Controllers\Doctor;

use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicRequest;
use App\Http\Requests\DoctorRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function newDoctor(DoctorRequest $request)
    {
        $validated=$request->validated();
        $images=['profile_image','card_image','ssn_image'];
        foreach ($images as $image)
        {
            $imagePath = $request->file($image)->store('doctor_images', 'public');
            $validated[$image]=$imagePath;
        }
        Doctor::create($validated);
        return BaseResponse::MakeResponse(null,true,['successMessage'=>"Doctor Created successfully"]);
    }
    public function addClinic(ClinicRequest $request)
    {
        $validated=$request->validated();
        Clinic::create($validated);
        return BaseResponse::MakeResponse(null,true,['successMessage'=>"Clinic Created successfully"]);
    }
}
