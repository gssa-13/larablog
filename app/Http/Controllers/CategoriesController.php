<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('blog.home', [
            'title' => "Publicaciones de la categoria $category->name",
            'posts' => $category->posts()->published()->paginate()
        ]);
    }
}
