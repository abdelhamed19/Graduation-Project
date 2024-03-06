<?php

use App\Http\Controllers\Doctor\DoctorController;
use Illuminate\Support\Facades\Route;

Route::post("doctor",[DoctorController::class,"newDoctor"]);
Route::post("clinic",[DoctorController::class,"addClinic"]);


require __DIR__.'/dashboard.php';
require __DIR__.'/user.php';
