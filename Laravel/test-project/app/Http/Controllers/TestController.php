<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function loadTestView()
    {
        echo "Hello!!!";
    }

    public function loadTestView2()
    {
        echo "Hello Sithum!!!";
    }

    public function loadTestView3()
    {
        echo "<h1>This is the third function</h1>";
    }
}
