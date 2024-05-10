<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publication;

class publicationController extends Controller
{
    public function registerPublication()
    {
        return view('publication/publication-register');
    }

    public function store(Request $request)
    {

        $requestData = $request->all();
        // dump($requestData);

        $validator = Validator::make($requestData, [
            'pub_name' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'isbn' => ['required', 'string', 'max:100'],
            'published_date' => ['required', 'date'],
            'cover_picture' => ['required'],
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $publication = Publication::create([
            'pub_name' => $request->pub_name,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'published_date' => $request->published_date,
            'cover_picture' => $request->cover_picture,
        ]);

        return redirect()->back()->with(
            'success',
            'Record created successfully'
        );
    }
}
