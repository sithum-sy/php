<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestViewController extends Controller
{
    public function loadTestView(String $name)
    {
        return view('test/test-view', ['user' => $name]);
    }
}
