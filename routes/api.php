<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestController;    
use App\Http\Controllers\Api\PostController;    
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\CourseController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', [TestController::class, 'testApi']); // bebas diakses
// Hanya bisa diakses jika sudah login dan punya token
Route::middleware('auth:sanctum')->get('/test-auth', [TestController::class, 'testAuth']);

Route::post('/register', [App\Http\Controllers\Api\RegisterController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login']);


    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class, 'destroy']);
    Route::post('/posts/{post}/toggle-like', [PostController::class, 'toggle']);

    Route::apiResource('courses', CourseController::class);
