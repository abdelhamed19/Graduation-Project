<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\{ClinicRequest, DoctorLoginRequest, DoctorRequest};
use App\Models\{Clinic,Doctor,Plan,Role,Subscription};
use Illuminate\Support\Facades\{Auth,Hash};

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
        $doctor=Doctor::create($validated);
        $token = $doctor->createToken('doctor-registration-token')->plainTextToken;
        return BaseResponse::MakeResponse(["doctor"=>$doctor,'token'=>$token],true,['successMessage'=>"Doctor Created successfully"]);
    }
    public function addClinic(ClinicRequest $request)
    {
        $validated=$request->validated();
        Clinic::create($validated);
        return BaseResponse::MakeResponse(null,true,['successMessage'=>"Clinic Created successfully"]);
    }
    public function doctorLogin(DoctorLoginRequest $request)
    {
        $validated=$request->validated();
        $doctor = Doctor::where("email", $validated['email'])->first();
        if (!$doctor || !Hash::check($validated['password'], $doctor->password)) {
            return BaseResponse::MakeResponse(null, false, ["errorMessage" => "البريد الإلكتروني أو كلمة المرور غير صحيحة"]);
        }
        $token = $doctor->createToken('doctor-token')->plainTextToken;
        $subscription=$doctor->subscription;
        return BaseResponse::MakeResponse(["subscription"=>$subscription,"token" => $token], true, ["successMessage" => 200]);
    }

    public function subscripePlan(Request $request)
    {
        $doctor=Auth::guard('doctors')->user();
        if (!$doctor)
        {
            return BaseResponse::MakeResponse(null,false,['errorMessage'=>"Email Not Found"]);
        }
        $subscription=Subscription::where("doctor_id",$doctor->id)->first();
        $imagePath = $request->file('receipt')->store('receipts', 'public');
        $subscription->update([
          "plan_id"=>$request->planID,
          "receipt"=>$imagePath,
      ]);
        return BaseResponse::MakeResponse(null, true, ["successMessage" => "Subscription Created succefully"]);
    }
    public function getDoctorInfo(Request $request)
    {
        $doctor=Auth::guard("doctors")->user();
        $coupon=$doctor->subscription->coupon_remaining;
        $articles=$doctor->subscription->posts_remaining;
        return BaseResponse::MakeResponse(["Coupons-Remaining"=>$coupon,"articles"=>$articles], true, ["successMessage" => "Info Retrived succefully"]);
    }
}
