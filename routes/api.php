<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FacultyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/applications', [ApplicationController::class, 'index']);
    Route::get('/faculties', [FacultyController::class, 'index']);
    Route::post('/applications', [ApplicationController::class, 'store']);
});



Route::post('/login', [AuthController::class, 'login']);
