<?php

use App\Http\Controllers\Dashboard\ManageController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::post("addLevel",[ManageController::class,"addLevel"]);
    Route::post("addActivity",[ManageController::class,"addActivity"]);
});
