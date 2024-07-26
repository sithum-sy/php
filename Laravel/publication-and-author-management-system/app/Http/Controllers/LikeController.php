<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Publication $publication)
    {
        $user = Auth::user();
        $like = $publication->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            $publication->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        $likeCount = $publication->likes->count();
        return response()->json(['liked' => $liked, 'likeCount' => $likeCount, 'message' => $liked ? 'Liked' : 'Unliked']);
    }
}
