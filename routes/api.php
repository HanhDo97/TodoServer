<?php

use App\Http\Controllers\Api\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get_token', [TokenController::class, 'getToken']);
Route::get('/check_token', [TokenController::class, 'checkToken'])
->middleware('auth:sanctum');
