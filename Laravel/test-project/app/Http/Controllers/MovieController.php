<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        echo "<h1>Movies List</h1>";
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
