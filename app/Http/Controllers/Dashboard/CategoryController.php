<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($locale, StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $result = Category::create($data);
        if ($result) {
            return redirect()->route('categories.index', app()->getLocale())->with('success', 'Category has been created');
        } else {
            return redirect()->route('categories.index', app()->getLocale())->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($locale, Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($locale, Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($locale, UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $result = $category->update($data);
        if ($result) {
            return redirect()->route('categories.index', app()->getLocale())->with('success', 'Category has been updated');
        } else {
            return redirect()->route('categories.index', app()->getLocale())->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($locale, Category $category)
    {
        $result =  $category->delete();
        if ($result) {
            return redirect()->route('categories.index', app()->getLocale())->with('success', 'Category has been deleted');
        } else {
            return redirect()->route('categories.index', app()->getLocale())->with('error', 'Something went wrong');
        }
    }
}
