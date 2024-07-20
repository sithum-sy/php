<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Publication;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');

        $publications = Publication::all();
        // $categories = Category::find($id);
        $publications = Publication::with('category')->get();
        // dd($publications);
        return view('home', ['publications' => $publications]);
    }
}
