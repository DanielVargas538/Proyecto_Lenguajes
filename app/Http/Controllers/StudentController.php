<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('Student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(Student::rules());     
        
        $students = new Student();
        $students->first_name = $request->get('first_name');
        $students->last_name = $request->get('last_name');
        $students->identification = $request->get('identification');

        $students->save();
        
        return redirect('/students')->with('success',  __('students.message.create', ['attribute' => __('students.student')]))->with('title', __('students.title_alert.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('Student.edit')->with('student',$student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $student = Student::find($id);
        $request->validate(Student::rules($student));

        $student->first_name = $request->get('first_name');
        $student->last_name = $request->get('last_name');
        $student->identification = $request->get('identification');

        $student->save();
        return redirect('/students')->with('success',  __('students.message.edit',['attribute' => __('students.student')]))->with('title', __('students.title_alert.edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('success',  __('students.message.delete', ['attribute' => __('students.student')]))->with('title', __('students.title_alert.delete'));
    }
}
