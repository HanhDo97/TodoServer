<?php

use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('token')->middleware('auth:sanctum')->group(function () {

    Route::post('/get', [TokenController::class, 'getToken'])->withoutMiddleware('auth:sanctum');

    Route::get('/revoke', [TokenController::class, 'revokeToken'])
        ->middleware('auth:sanctum');
});

Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/get', [UserController::class, 'getInfor']);
});