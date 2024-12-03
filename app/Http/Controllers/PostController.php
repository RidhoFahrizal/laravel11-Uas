<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
    public function create(User $user)
    {
        return view('make-post', ['user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // Generate unique slug
        $slug = Str::slug($validatedData['title']);
        $originalSlug = $slug;
        $counter = 1;

        // Ensure unique slug
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $post = $user->posts()->create([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'slug' => $slug
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        return view('show-post', ['title' => 'Yout Post','post' => $post]);
    }
}

