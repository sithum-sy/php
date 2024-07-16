<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Publication;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('publication/publication-form', compact('categories'));
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $validator = Validator::make($requestData, [
            'pub_name' => ['required', 'string', 'max:100'],
            'category_id' => 'required|exists:categories,id',
            'isbn' => ['required', 'string'],
            'published_date' => ['required', 'date'],
            'cover_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $publication = Publication::create([
            'pub_name' => $request->pub_name,
            'category_id' => $request->category_id,
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
