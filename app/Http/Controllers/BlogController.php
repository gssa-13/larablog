<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class BlogController extends Controller
{
    public function __invoke()
    {
        $posts = Post::published()->get();

        return view('welcome', compact('posts'));
    }
}
