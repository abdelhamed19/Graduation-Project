<?php

use App\Http\Controllers\Doctor\ArticleController;
use App\Http\Controllers\Doctor\CouponController;
use App\Http\Controllers\Doctor\DoctorController;
use Illuminate\Support\Facades\Route;

Route::post("doctor",[DoctorController::class,"newDoctor"]);
Route::post("doctor-login",[DoctorController::class,"doctorLogin"]);
Route::post("clinic",[DoctorController::class,"addClinic"]);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("doctor-profile",[DoctorController::class,"profile"]);
    Route::post("doctor-logout",[DoctorController::class,"logout"]);
    Route::post("subscribe-plan",[DoctorController::class,"subscripePlan"]);
    Route::resource("articles",ArticleController::class);
    Route::resource("coupon",CouponController::class);
    Route::get("info",[DoctorController::class,"getDoctorInfo"]);
});

