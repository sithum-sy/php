<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;


class MovieController extends Controller
{
    public function index()
    {
        echo "<h1>Movies List</h1>";
    }

    public function index1()
    {
        echo "<h1> Other Movies List</h1>";
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        // dd($request); // dd - die & dump

        $requestData = $request->all();
        // dump($requestData);

        $validator = Validator::make($requestData, [
            'name' => ['required', 'string', 'max:100', 'min:5'],
            'release_date' => ['required', 'date'],
            'director' => ['required', 'string', 'max:50'],
        ]);

        if ($validator->fails()) {

            // return response()->json(['errors' => $validator->errors()], 400);

            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $movie = Movie::create([
            'name' => $request->name,
            'release_date' => $request->release_date,
            'director' => $request->director,
        ]);

        return redirect()->back()->with(
            'success',
            'Record created successfully'
        );
    }
}
