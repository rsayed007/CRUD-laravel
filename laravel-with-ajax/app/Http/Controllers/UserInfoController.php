<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInfoController extends Controller
{
    public function index()
    {
        return view('userinfo');
    }
    public function importData(Request $request)
    {
        $data = $request->all();
        return $data;
    }
}
