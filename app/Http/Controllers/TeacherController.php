<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $saved_teachers = Teacher::all();
        return view('wpteacher', ['teacher' => $saved_teachers]);
    }

    public function create()
    {
        $saved_teachers = Teacher::all();
        return view('Layout_forms.TeacherAddingForm', ['teacher' => $saved_teachers]);
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ]);

        Teacher::create([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'phone_number'=>$request->get('phone_number'),
            'email'=>$request->get('email'),
        ]);
        return redirect()->route('teachers.index');
    }

    public function show(string $id)
    {
    }

    public function edit(Teacher $teacher)
    {
        return view('Layout_forms.TeacherEdit', ['teachers'=> $teacher]);
    }

    public function update(Teacher $teacher, Request $request)
    {

        $data =$request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required|numeric',
            'email' => 'required|email',
        ]);
        $teacher->update($data);
        return redirect(route('teachers.index'))->with('success', 'Updated');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect(route('teachers.index'));
    }
}
