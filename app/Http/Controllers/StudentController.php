<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Group;
use Cassandra\Custom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Student::query();
        if (request()->has('search')){
            $search = request()->get('search','');
            $query->where('name', 'like', '%' . $search . '%');
        }
        $saved_students = $query->get();
        return view('wpstudent', ['student' => $saved_students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saved_students = Student::all();
        $groups= Group::all();
        return view('Layout_forms.StudentAddingForm', ['student'=>$saved_students], ['group'=>$groups]);
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
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
//        $search = $request->search ?? null;
//
//        if ($search)
//        {
//            $saved_students = Student::where('name', "like", "%".$search."%")->get();
//        }else{
//            $saved_students = Student::all();
//        }
//        return view('wpstudent', compact('students', 'search'));
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

        return redirect(route('students.index'))->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('students.index'));
    }



}
