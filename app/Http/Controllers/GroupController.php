<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Location;
use App\Models\Teacher;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function GroupList()
   {
       $group = Group::all();
       return view('wpgroup', ['group' => $group]);
   }
    public function index()
    {
        $teacher = Teacher::all();
        $location = Location::all();
        return view('Layout_forms.GroupAddingForm', ['teachers' => $teacher, 'locations' => $location]);
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
    public function store(Request $request)
    {
//        $request-> validate([
//                'name' => 'required',
//                'classes_day' => 'required',
//                'classes_hour' => 'required',
//                'teacher_id' => 'required',
//                'location_id' => 'required',
//        ]);
        Group::create([
            'name' => $request->get('name'),
            'classes_day' => $request->get('classes_day'),
            'classes_hour' => $request->get('classes_hour'),
            'teacher_id' => $request->get('teacher_id'),
            'location_id' => $request->get('location_id'),



        ]);
        return redirect()->route('group.index');
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
