<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\student\student;


class StudentController extends Controller
{
    public function index()
    {
    	$students = student::all();
    	return view('index',compact('students'));
    }

    public function create()
    {
    	return view('create');
    }

    public function edit($id)
    {
    	$student = student::find($id);
    	return view('edit',compact('student'));
    }


    public function store( Request $request)
    {
    	$this->validate($request, [

            'name' 			=> 'required',
            'reg_number' 	=> 'required',
            'depertment' 	=> 'required',
            'info' 			=> 'required',
            
        ]);
        
    	$students = new student;

    	$students->name 			= $request->name;
    	$students->reg_id 			= $request->reg_number;
    	$students->department_name 	= $request->depertment;
    	$students->info 			= $request->info;

    	$students->save();
    	return redirect(route('index'));
    }


    public function update( Request $request, $id)
    {
    	$this->validate($request, [

            'name' 			=> 'required',
            'reg_number' 	=> 'required',
            'depertment' 	=> 'required',
            'info' 			=> 'required',
            
        ]);



    	$students = student::find($id);

    	$students->name 			= $request->name;
    	$students->reg_id 			= $request->reg_number;
    	$students->department_name 	= $request->depertment;
    	$students->info 			= $request->info;

    	$students->save();
    	return redirect(route('index'));
    }

   public function delete( $id)
    {

    	$students = student::find($id);

    	$students->delete();

        return redirect()->back();
    	//return redirect(route('index'));
    }
}
