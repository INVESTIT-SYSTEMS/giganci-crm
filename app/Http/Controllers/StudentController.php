<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saved_students = Student::all();
        $groups= Group::all();
        return view('Layout_forms.StudentAddingForm', ['student'=>$saved_students], ['group'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function StudentList()
    {
        $saved_students = Student::all();
        return view('wpstudent', ['student' => $saved_students]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|min:4|max:4',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|min:9|max:9',
            'parent_email' => 'required',
        ]);

        Student::create([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'birth_year'=>$request->get('birth_year'),
            'parent_name'=>$request->get('parent_name'),
            'parent_surname'=>$request->get('parent_surname'),
            'parent_phone_number'=>$request->get('parent_phone_number'),
            'parent_email'=>$request->get('parent_email'),
        ]);
        return redirect()->route('wpstudent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $addStudent)
    {
        return view('Layout_forms.StudentEdit', ['student'=>$addStudent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Student $addStudent, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|min:4|max:4',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|min:9|max:9',
            'parent_email' => 'required',
        ]);
        $addStudent->update($data);
        return redirect(route('wpstudent'))->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
