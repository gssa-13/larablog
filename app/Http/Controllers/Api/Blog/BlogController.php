<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

        $posts = $query->paginate();

        return $posts;
    }

    public function show(Post $post)
    {
        if ( $post->isPublished()  || Auth::check()) {
            return $post->load('user', 'category', 'tags', 'photos');
        }

        abort(404);
    }

    public function archive()
    {
        $data = [
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::latest()->take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archives' => Post::byYearAndMonth()->get()
        ];

        return $data;

    }
}
