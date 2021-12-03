<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function home()
    {
        $posts = Post::published()->paginate(15);

        return view('blog.home', compact('posts'));
    }

    public function show(Post $post)
    {
        if ( $post->isPublished()  || Auth::check()) {
            return view('blog.post', compact('post'));
        }

        abort(404);
    }

    public function about()
    {
        return view('blog.about');
    }

    public function archive()
    {
        return view('blog.archive');
    }

    public function contact()
    {
        return view('blog.contact');
    }
}
