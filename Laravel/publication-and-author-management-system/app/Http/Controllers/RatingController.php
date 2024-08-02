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

        request()->validate(['rate' => 'required']);
        $publication = Publication::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $publication->ratings()->save($rating);

        return redirect()->back()->with('status', 'Your rating has been submitted.');
    }
}
