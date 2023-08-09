<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($locale, StorePostRequest $request)
    {
        $data = $request->validated();
        $fileName = '';
        if ($request->image) {
          $fileName = $request->image->store('posts', 'public');
        }
        $data['image'] = $fileName;
        $result = Post::create($data);
        if ($result) {
            return redirect()->route('posts.index', app()->getLocale())->with('success', 'Post has been created');
        } else {
            return redirect()->route('posts.index', app()->getLocale())->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($locale, Post $post)
    {
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($locale, UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $fileName = '';
        $destination = public_path('storage\\' . $post->image);
        if($request->image != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
          $fileName = $request->image->store('posts', 'public');
        }
        $data['image'] = $fileName;
        $result = $post->update($data);
        if ($result) {
            return redirect()->route('posts.index', app()->getLocale())->with('success', 'Post has been Updated');
        } else {
            return redirect()->route('posts.index', app()->getLocale())->with('error', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($locale, Post $post)
    {
        $result = $post->delete();
        if ($result) {
            return redirect()->route('posts.index', app()->getLocale())->with('success', 'Post has been deleted');
        } else {
            return redirect()->route('posts.index', app()->getLocale())->with('error', 'Something went wrong');
        }
    }
}
