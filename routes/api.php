<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Blog\BlogController;

Route::get('/posts',[BlogController::class, 'home']);
Route::get('/blog/{post}',[BlogController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
