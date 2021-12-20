<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagsController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $posts = $tag->posts()->published()->paginate();
        //'title' => "Publicaciones de la etiqueta $tag->name",
        return $posts;
    }
}

