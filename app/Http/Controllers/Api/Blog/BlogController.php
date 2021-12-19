<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function home(Request $request)
    {
        $query = Post::published();

        if( $request->input('year') ) {
            $query->whereYear('published_at', $request->input('year'));
        }

        if( $request->input('month') ) {
            $query->whereMonth('published_at', $request->input('month'));
        }

        $posts = $query->paginate(10);

        return $posts;
    }

    public function show(Post $post)
    {
        if ( $post->isPublished()  || Auth::check()) {
            return $post;
        }

        abort(404);
    }
}
