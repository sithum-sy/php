<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestParametersController extends Controller
{
    public function testURLParams(int $id)
    {
        echo "Hello Sithum!!!" . "<br>";
        echo "Id =  " . $id / 2;
    }

    public function testURLParams2(String $name)
    {
        echo "Hello User!!!" . "<br>";
        echo "Name =  " . $name;
    }

    public function testManyURLParams(int $num, String $user)
    {
        echo "This is to check many paramaters" . "<br>";
        echo "ID =  " . $num / 2;
        echo "Name =  " . $user;
    }
}
