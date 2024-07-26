<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment(Request $request, Publication $publication)
    {
        $request->validate(['content' => 'required|string']);
        $user = Auth::user();

        $comment = $publication->comments()->create([
            'user_id' => $user->id,
            'content' => $request->content,
        ]);

        return response()->json([
            'user' => ['name' => $user->name],
            'content' => $comment->content,
            'created_at' => $comment->created_at->diffForHumans()
        ]);
    }
}
