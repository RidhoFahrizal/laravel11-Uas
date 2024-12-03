<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Post $post)
    {
        $user = Auth::user();

        $existingLike = Like::where('post_id', $post->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            return response()->json(['status' => 'removed']);
        }

        Like::create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            'is_like' => true
        ]);

        return response()->json(['status' => 'liked']);
    }
}
