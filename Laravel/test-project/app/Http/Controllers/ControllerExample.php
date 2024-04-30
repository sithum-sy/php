<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerExample extends Controller
{
    public function exampleView()
    {
        echo "<h1>Hello there, this is an example for a controller in MCV model";
    }

    public function exampleViewParam($name)
    {
        echo "<h1>Hello there, my name is " . $name;
    }

    public function exampleTestView()
    {
        return view('test/example-view');
    }
}
