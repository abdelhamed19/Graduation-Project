<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\Profile\{ProfileController,AuthController};

// Auth Routes
Route::post("register",[AuthController::class,"register"]);
Route::post("login",[AuthController::class,"login"]);
Route::middleware('auth:sanctum')->group(function () {
    Route::post("logout",[AuthController::class,"logout"]);
});

// Profile Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("profile",[ProfileController::class,"profile"]);
    Route::post("changePassword",[ProfileController::class,"changePassword"]);
    Route::get("getTestScore",[ProfileController::class,"getTestScore"]);
    Route::get("getTotalScore",[ProfileController::class,"getTotalScore"]);
});


// Score Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post("storeResult/{id}",[ScoreController::class,"storeResult"]);
});

// Test Routes
// Route::middleware('auth:sanctum')->group(function () {

// });
