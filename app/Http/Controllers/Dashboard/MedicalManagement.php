<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\BaseResponse;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalManagement extends Controller
{
    public function getPendingDoctors(Request $request)
    {
        $subscription=Subscription::doctors("pending")->with("doctor")->get();
        if ($subscription->isEmpty())
        {
            return BaseResponse::MakeResponse(null,false,['errorMessage'=>"No Doctors yet"]);
        }
        return BaseResponse::MakeResponse(["subscription"=>$subscription],true,['successMessage'=>"Doctors Retrived successfully"]);
    }
    public function getStagingDoctors(Request $request)
    {
        $subscription=Subscription::doctors("staging")->with("doctor")->get();
        if ($subscription->isEmpty())
        {
            return BaseResponse::MakeResponse(null,false,['errorMessage'=>"No Doctors yet"]);
        }
        return BaseResponse::MakeResponse(["subscription"=>$subscription],true,['successMessage'=>"Doctors Retrived successfully"]);
    }
    public function getAllDoctors(Request $request)
    {
        $subscription=Subscription::doctors("accepted")->with("doctor")->get();
        if ($subscription->isEmpty())
        {
            return BaseResponse::MakeResponse(null,false,['errorMessage'=>"No Doctors yet"]);
        }
        return BaseResponse::MakeResponse(["subscription"=>$subscription],true,['successMessage'=>"Doctors Retrived successfully"]);
    }
    public function stageRequest(Doctor $doctor)
    {
       $doctor->subscription()->update([
           "type"=>"staging"
       ]);
        return BaseResponse::MakeResponse(["doctor-data"=>$doctor],true,['successMessage'=>"Doctor Statged successfully"]);
    }
    public function acceptRequest(Doctor $doctor)
    {
        $doctor->subscription()->update([
            "type"=>"accepted"
        ]);
        return BaseResponse::MakeResponse(["doctor-data"=>$doctor],true,['successMessage'=>"Doctors Accepted successfully"]);
    }
    public function refuseRequest(Doctor $doctor)
    {
        $doctor->subscription()->update([
            "type"=>"refused"
        ]);
        return BaseResponse::MakeResponse(["doctor-data"=>$doctor],true,['successMessage'=>"Doctor Refused successfully"]);
    }
}
