<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LeaderboardController;
use App\Http\Controllers\API\StampController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'RegisterVisitor']);
Route::post('/login', [AuthController::class, 'LoginVisitor']);
Route::post('/developer/login/{division}', [AuthController::class, 'loginDeveloper']);
Route::get('/division', [AuthController::class, 'seeDivision']);
Route::get('/projects', [LeaderboardController::class, 'seeProjects']);
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/stamp')->group(function () {
        Route::post('/send/{visitor_id}', [StampController::class,'sendStamp']);
        Route::get('/see/{visitor_id}', [StampController::class,'seeStamp']);
    });

    Route::get('/stats/{visitor_id}', [StampController::class,'userStats']);
    Route::post('/gacha/{visitor_id}', [StampController::class,'gacha']);

    Route::post('/vote/{project_id}', [LeaderboardController::class, 'sendVote']);
});


