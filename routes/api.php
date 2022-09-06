<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user/posts', function () {
        return auth()->user()->posts;
    });

    Route::post('posts', [\App\Http\Controllers\PostController::class, 'store']);
    Route::get('posts-auth/{post}', [\App\Http\Controllers\PostController::class, 'edit']);
    Route::patch('posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);
    Route::delete('posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']);
});

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show']);
