<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saved_teachers = Teacher::all();
        return view('Layout_forms.TeacherAddingForm', ['teacher' => $saved_teachers]);

    }

    public function TeachersList()
    {
        $saved_teachers = Teacher::all();
        return view('wpteacher', ['teacher' => $saved_teachers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required|min:9|max:9',
            'email' => 'required',
        ]);

        Teacher::create([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'phone_number'=>$request->get('phone_number'),
            'email'=>$request->get('email'),
        ]);
        return redirect()->route('wpteacher');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $addTeacher)
    {
        return view('layout_forms.TeacherEdit', ['teacher'=> $addTeacher]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Teacher $addTeacher, Request $request)
    {
        $data =$request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required|min:9|max:9',
            'email' => 'required',
        ]);
        $addTeacher->update($data);
        return redirect(route('wpteacher'))->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
