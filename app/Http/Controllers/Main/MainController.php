<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('main.index', compact('categories', 'posts'));
    }
    public function show($locale, Post $post)
    {
        $categories = Category::all();
        return view('main.show', compact('post', 'categories'));
    }
    public function categoryFilter($locale, Category $category)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $category->id)->paginate(5);
        return view('main.main-category', compact('posts', 'categories', 'category'));
    }
}
