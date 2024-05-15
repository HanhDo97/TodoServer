<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TodoController;
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


Route::middleware('auth:sanctum')->group(function () {
    // For user action
    Route::resource('todos', TodoController::class)->only(['store', 'update']);
    Route::resource('tasks', TaskController::class)->only(['store', 'update']);

    // For admin action
    Route::get('todos', [TodoController::class, 'index'])
        ->name('todos.index')
        ->middleware('ability:full-access');


});
