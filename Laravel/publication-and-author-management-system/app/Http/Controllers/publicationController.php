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
            'cover_picture' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasfile('cover_picture')) {
            $file = $request->file('cover_picture');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('uploads/covers/', $fileName);
        }

        $publication = Publication::create([
            'pub_name' => $request->pub_name,
            'author' => $request->author,
            'category' => 'fiction',
            'isbn' => $request->isbn,
            'published_date' => $request->published_date,
            'cover_picture' => $fileName
        ]);

        return redirect()->back()->with(
            'success',
            'Record created successfully'
        );
    }
}
