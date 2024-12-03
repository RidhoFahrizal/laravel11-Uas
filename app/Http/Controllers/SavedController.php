<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SavedPost;
use Illuminate\Support\Facades\Auth;

class SavedController extends Controller
{
    public function toggleSave(Post $post)
    {
        $user = Auth::user();

        $savedPost = SavedPost::where('post_id', $post->id)
            ->where('user_id', $user->id)
            ->first();

        if ($savedPost) {
            $savedPost->delete();
            return response()->json(['status' => 'unsaved']);
        }

        SavedPost::create([
            'post_id' => $post->id,
            'user_id' => $user->id
        ]);

        return response()->json(['status' => 'saved']);
    }

    public function getSavedPosts()
    {
        $savedPosts = Auth::user()->savedPosts()->with('post')->get();
        return view('saved-posts', compact('savedPosts'));
    }
}
