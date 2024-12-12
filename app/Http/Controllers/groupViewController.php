<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Location;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class groupViewController extends Controller
{

    public function index()
    {

    }


    public function create(Request $request)
    {
        return view('Layout_forms.GroupViewAddForm', [
            'group' => Group::where('name', $request->get('groupName'))->get(),
        ]);
    }


    public function store(Request $request, $groupView)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|numeric',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|numeric',
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
        return redirect()->route('groups.show' , ['group'=>$groupView]);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Student $groupView)
    {
        $groups= Group::all();
        return view('Layout_forms.GroupViewEdit', ['student'=>$groupView, 'group'=>$groups]);
    }


    public function update(Student $groupView, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|numeric',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|numeric',
        ]);
        $groupView->update([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'birth_year'=>$request->get('birth_year'),
            'parent_name'=>$request->get('parent_name'),
            'parent_surname'=>$request->get('parent_surname'),
            'parent_phone_number'=>$request->get('parent_phone_number'),
            'parent_email'=>$request->get('parent_email'),
            'group_id'=>$request->get('group_id'),
        ]);

        return redirect(route('groups.show', ['group'=>$request->get('group')]));
    }


    public function destroy(Student $groupView, Request $request)
    {
        $groupView->delete();
        return redirect(route('groups.show', ['group'=>$request->get('group')]));
    }
}
