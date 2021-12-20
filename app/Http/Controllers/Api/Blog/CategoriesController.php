<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function __invoke(Category $category)
    {
        $posts = $category->posts()->published()->paginate();
        return $posts;
        //'title' => "Publicaciones de la categoria $category->name",

    }
}
