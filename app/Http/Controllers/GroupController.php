<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Location;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $group = Group::all();
        return view('wpgroup', ['group' => $group]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = Teacher::all();
        $location = Location::all();
        return view('Layout_forms.GroupAddingForm', ['teachers' => $teacher, 'locations' => $location]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
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
        return redirect()->route('Group.index');
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
    public function edit(Group $group): View
    {
        $teacher = Teacher::all();
        $location = Location::all();
        return view('Layout_forms.GroupEditForm', ['groups'=>$group, 'teachers' => $teacher, 'locations' => $location]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group): RedirectResponse
    {
        $group ->update([
            'name' => $request->get('name'),
            'classes_day' => $request->get('classes_day'),
            'classes_hour' => $request->get('classes_hour'),
            'teacher_id' => $request->get('teacher_id'),
            'location_id' => $request->get('location_id'),
        ]);
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group): RedirectResponse
    {
        $group -> delete();
        return redirect()->route('groups.index');
    }
}
