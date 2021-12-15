<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function __invoke()
    {
        return view('blog.spa');
    }

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
        $archives = Post::byYearAndMonth()->get();

        return view('blog.archive',[
            'authors' => User::latest()->take(4)->get(),
            'categories' => Category::latest()->take(7)->get(),
            'posts' => Post::latest('published_at')->take(5)->get(),
            'archives' => $archives
        ]);
    }

    public function contact()
    {
        return view('blog.contact');
    }
}
