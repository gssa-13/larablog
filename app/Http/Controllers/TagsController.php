<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('blog.home', [
            'title' => "Publicaciones de la etiqueta $tag->name",
            'posts' => $tag->posts()->published()->paginate()
        ]);
    }
}
