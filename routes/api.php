<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Blog\BlogController;
use App\Http\Controllers\Api\Blog\CategoriesController;
use App\Http\Controllers\Api\Blog\TagsController;

Route::get('/posts',[BlogController::class, 'home']);
Route::get('/blog/{post}',[BlogController::class, 'show']);
Route::get('/categories/{category}', CategoriesController::class);
Route::get('/tags/{tag}', TagsController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
