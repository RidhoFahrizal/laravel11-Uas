<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:255',
            'description' => 'nullable|max:500'
        ]);

        $category = Category::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description']
            // slug will be auto-generated
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        // Fetch posts in this category with pagination
        $posts = $category->posts()->with('author')->paginate(10);
        return view('categories.show', compact('category', 'posts'));
    }
}
