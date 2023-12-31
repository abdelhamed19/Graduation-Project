<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;


// Auth Routes
Route::post("register",[AuthController::class,"register"]);
Route::post("login",[AuthController::class,"login"]);
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

// Score Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post("storeResult/{id}",[ScoreController::class,"storeResult"]);
});

// Test Routes
// Route::middleware('auth:sanctum')->group(function () {

// });

require __DIR__.'/dashboard.php';
