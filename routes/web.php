<?php

use Illuminate\Support\Facades\Route;

use App\Models\Post;

Route::get('/', function () {
    $posts = Post::latest('published_at')->get();
    return view('welcome', compact('posts'));
});
