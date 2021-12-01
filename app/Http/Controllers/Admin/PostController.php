<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required']);

        $post = Post::create($request->only('title'));

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'excerpt' => 'required'
        ]);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->excerpt = $request->input('excerpt');
        $post->category_id = Category::find($cat = $request->input('category'))
                            ? $cat
                            : Category::create(['name' => $cat])->id;
        $post->published_at =
            $request->has('published_at')
                ? Carbon::parse($request->input('published_at'))
                : null ;
        $post->save();

        $tags = [];

        foreach ($request->input('tags') as $tag)
        {
            $tags[] = Tag::find($tag)
                ? $tag
                : Tag::create(['name' => $tag])->id ;
        }

        $post->tags()->sync($tags);

        return  redirect()->route('admin.posts.edit', $post)->with('success', 'Tu publicacion ha sido guardada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
