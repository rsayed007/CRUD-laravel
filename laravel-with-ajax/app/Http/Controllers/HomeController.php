<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('home', compact('users'));
    }
    public function createUser(Request $request)
    {
        $insertData = User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => Carbon::now(),
        ]);
        if ($insertData) {
            return response()->json('success');
        }
        else{
            return response()->json('error');
        }
    }
    public function getData()
    {
        $users = User::latest()->paginate(5);
        return view('userResponse', compact('users'));
    }
    public function viewData(Request $request)
    {
        $id = $request->id;
        $userData = User::find($id);
        return $userData;
    }
    public function deleteData(Request $request)
    {
        $id = $request->id;
        $delete = User::find($id)->delete();
        if ($delete) {
            return response()->json('success');
        }else{
            return response()->json('error');

        }
    }
    public function editData(Request $request)
    {
        $id = $request->id;
        $userData = User::find($id);
        return $userData;
    }
    public function updateData(Request $request)
    {
        $id = $request->id;
        $updateData = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'updated_at' =>Carbon::now(),
        ]);
        if ($updateData) {
            return response()->json('success');
        }else{
            return response()->json('error');

        }
    }
}
