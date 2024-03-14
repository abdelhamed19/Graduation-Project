<?php

use App\Http\Controllers\Home\HomeArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\ActivityController;
use App\Http\Controllers\Scoring\{ScoreController,TestController};
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
    Route::get("getTotalScore",[ProfileController::class,"getTotalScore"]);
});


// Score Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post("storeResult/{id}",[ScoreController::class,"storeResult"]);
});


//Test Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post("test",[TestController::class,"storeTestResult"]);
    Route::get("test",[TestController::class,"getTestResult"]);
});


// Activity Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("getCompletedActivities",[ActivityController::class,"getCompletedActivities"]);
    Route::get("getInCompletedActivities",[ActivityController::class,"getInCompletedActivities"]);
    Route::get("type",[ActivityController::class,"typeOfCompletedActivities"]);
    });

// Activity Routes

    Route::get("platinum-articles",[HomeArticleController::class,"platinum"]);

