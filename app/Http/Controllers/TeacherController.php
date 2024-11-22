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
        return view('Layout_forms.TeacherAddingForm', ['user' => $saved_teachers]);

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
        return redirect()->route('TeacherController_routes');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
