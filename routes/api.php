<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\{HomeController,LevelController,ActivityController};
use App\Http\Controllers\Writings\{NotesController, PostController, TasksController};


// Home Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get("homepage",[HomeController::class,"index"]);
    Route::get("getUserData",[HomeController::class,"getUserData"]);
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


//Notes
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('notes', NotesController::class);
});


//Tasks
Route::middleware('auth:sanctum')->group(function (){
    Route::get('tasks/{created_at}',[TasksController::class,"show"]);
    Route::post('tasks', [TasksController::class,"store"]);
});

Route::middleware('auth:sanctum')->group(function (){
    Route::get('posts',[PostController::class,"index"]);
    Route::post('post', [PostController::class,"store"]);
    Route::post('like/{post}', [PostController::class,"like"]);
});


require __DIR__.'/dashboard.php';
require __DIR__.'/user.php';
