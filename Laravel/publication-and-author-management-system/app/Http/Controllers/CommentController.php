<?php

namespace App\Http\Controllers;

use App\Mail\CommentNotificationMail;
use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $publication = $comment->publication;

        Mail::to($publication->author->email)
            ->send(
                new CommentNotificationMail(
                    $publication,
                    $comment
                )
            );

        return response()->json([
            'user' => ['name' => $user->name],
            'content' => $comment->content,
            'created_at' => $comment->created_at->diffForHumans()
        ]);
    }

    public function storeCommentTest(Publication $publication)
    {
        $user = Auth::user();

        $comment = $publication->comments()->create([
            'user_id' => $user->id,
            'content' => "test comment",
        ]);

        $publication = $comment->publication;



        // dd($comment, $publication);
        Mail::to($publication->author->email)
            ->send(
                new CommentNotificationMail(
                    $publication,
                    $comment
                )
            );

        return redirect()->back();
        // return redirect()->back()->with('success', 'Comment is created');


        // return response()->json([
        //     'user' => ['name' => $user->name],
        //     'content' => $comment->content,
        //     'created_at' => $comment->created_at->diffForHumans()
        // ]);
    }
}
