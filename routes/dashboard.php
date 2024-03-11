<?php

use App\Http\Controllers\Dashboard\{ManageController, MedicalManagement, RolesController};
use Illuminate\Support\Facades\Route;

// Controlling App from web Dashboard
Route::middleware(['auth:sanctum','checkRole:admin,super-admin'])->group(function () {
    Route::get("activities",[ManageController::class,"index"]);
    Route::post("addLevel",[ManageController::class,"addLevel"]);
    Route::post("addActivity",[ManageController::class,"addActivity"]);
    Route::delete("deleteLevel/{id}",[ManageController::class,"deleteLevel"]);
    Route::delete("deleteActivity/{id}",[ManageController::class,"deleteActivity"]);
});

// Controlling Roles on web Dashboard
Route::middleware(['auth:sanctum','checkRole:admin,super-admin'])->group(function () {
    Route::get("roles",[RolesController::class,"index"]);
    Route::post("add-role",[RolesController::class,"addNewRole"]);
    Route::put("update-role",[RolesController::class,"updateRole"]);
    Route::delete("delete-role/{id}",[RolesController::class,"deleteRole"]);
});

// Controlling Doctors on web Dashboard
Route::middleware(['auth:sanctum','checkRole:admin,super-admin'])->group(function () {
    Route::get("pending",[MedicalManagement::class,"getPendingDoctors"]);
    Route::get("staging",[MedicalManagement::class,"getStagingDoctors"]);
    Route::get("all-doctors",[MedicalManagement::class,"getAllDoctors"]);
    Route::post("stage-doctor/{doctor}",[MedicalManagement::class,"stageRequest"]);
    Route::post("accept-doctor/{doctor}",[MedicalManagement::class,"acceptRequest"]);
    Route::post("refuse-doctor/{doctor}",[MedicalManagement::class,"refuseRequest"]);
});
