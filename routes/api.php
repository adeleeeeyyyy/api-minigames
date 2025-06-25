<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StampController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'RegisterVisitor']);
Route::post('/login', [AuthController::class, 'LoginVisitor']);

Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('/stamp')->group(function () {
        Route::post('/send/{visitor_id}', [StampController::class,'sendStamp']);
        Route::get('/see/{visitor_id}', [StampController::class,'seeStamp']); 
    });
});


