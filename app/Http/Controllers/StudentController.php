<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Group;
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
            'group_id'=>$request->get('group_id'),
        ]);
        return redirect()->route('student.index');
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
    public function edit(Student $student)
    {
        $groups= Group::all();
        return view('Layout_forms.StudentEdit', ['student'=>$student, 'group'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Student $students, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|min:4|max:4',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|min:9|max:9',
            'parent_email' => 'required',
            'group_id' => 'required'
        ]);
        $students->update($data);

        return redirect(route('student.index'))->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $students)
    {
        $students->delete();
        return redirect(route('student.index'));
    }
}
