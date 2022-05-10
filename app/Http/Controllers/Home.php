<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function displayContent()
    {



        return view('home.index');
    }
}
