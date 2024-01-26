<?php

use App\Http\Controllers\Dashboard\{ManageController, RolesController};
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum','checkRole:admin,super-admin'])->group(function () {
    Route::post("addLevel",[ManageController::class,"addLevel"]);
    Route::post("addActivity",[ManageController::class,"addActivity"]);
    Route::delete("deleteLevel/{id}",[ManageController::class,"deleteLevel"]);
    Route::delete("deleteActivity/{id}",[ManageController::class,"deleteActivity"]);
});


Route::middleware(['auth:sanctum','checkRole:admin,super-admin'])->group(function () {
    Route::post("add-role",[RolesController::class,"addNewRole"]);
    Route::put("update-role",[RolesController::class,"updateRole"]);
});
