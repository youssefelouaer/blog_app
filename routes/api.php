<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comments', [CommentController::class, 'index']);
// Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store']);
// Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'update']);
// Route::get('/comments', [\App\Http\Controllers\CommentController::class, 'destroy']);


Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);
Route::put('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update']);
Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy']); //{post} specifies a certain instance of post

