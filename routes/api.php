<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/callback', [PostController::class, 'index']);
Route::get('/fetch', [PostController::class, 'fetch']);
Route::get('/redis', [PostController::class, 'redis']);
Route::get('/clear', [PostController::class, 'clear']);
