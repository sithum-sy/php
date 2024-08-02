<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Publication;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, Publication $publication)
    {
        // $request->validate([
        //     'rating' => 'required|integer|between:1,5',
        // ]);

        // $rating = Rating::updateOrCreate(
        //     [
        //         'publication_id' => $publication->id,
        //         'user_id' => Auth::id(),
        //     ],
        //     [
        //         'rating' => $request->input('rating'),
        //     ]
        // );

        // Validate the request
        $request->validate([
            'rate' => 'required|integer|between:1,5', // Adjust validation as needed
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has already rated this publication
        $existingRating = Rating::where('user_id', $user->id)
            ->where('publication_id', $publication->id)
            ->first();

        if ($existingRating) {
            // User has already rated this publication
            return redirect()->back()->with('error', 'You have already rated this publication.');
        }

        // Create a new rating
        Rating::create([
            'user_id' => $user->id,
            'publication_id' => $publication->id,
            'rating' => $request->input('rate'),
        ]);

        return redirect()->back()->with('success', 'Thank you for your rating!');
    }
}
