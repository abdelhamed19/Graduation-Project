<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\LevelController;
use App\Http\Controllers\Profile\AuthController;
use App\Http\Controllers\Home\ActivityController;
use App\Http\Controllers\Profile\ProfileController;


// Auth Routes
Route::post("register",[AuthController::class,"register"]);
Route::post("login",[AuthController::class,"login"]);
Route::post('forgot-password', [AuthController::class, 'sendOtp']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post("logout",[AuthController::class,"logout"]);
});

// Home Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("homepage",[HomeController::class,"index"]);
    Route::get("getUserData",[HomeController::class,"getUserData"]);
});

// Profile Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("profile",[ProfileController::class,"profile"]);
    Route::post("changePassword",[ProfileController::class,"changePassword"]);
    Route::get("getTestScore",[ProfileController::class,"getTestScore"]);
    Route::get("getTotalScore",[ProfileController::class,"getTotalScore"]);
});

// Level Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("showLevelActivities/{id}",[LevelController::class,"showLevelActivities"]);
    Route::get("getLevelScore/{id}",[LevelController::class,"getLevelScore"]);
    Route::get("getLevelStatus/{id}",[LevelController::class,"getLevelStatus"]);
});


// Activity Routes
Route::get("showActivity/{id}",[ActivityController::class,"showActivity"]);
Route::get("getTotalActivities",[ActivityController::class,"getTotalActivities"]);
Route::middleware('auth:sanctum')->group(function () {
Route::get("getCompletedActivities",[ActivityController::class,"getCompletedActivities"]);
Route::get("getInCompletedActivities",[ActivityController::class,"getInCompletedActivities"]);
});


// Score Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post("storeResult/{id}",[ScoreController::class,"storeResult"]);
});

// Test Routes
// Route::middleware('auth:sanctum')->group(function () {

// });

require __DIR__.'/dashboard.php';
