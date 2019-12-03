<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testControler extends Controller
{
    public function test()
    {
    	return view('index');
    }
}
