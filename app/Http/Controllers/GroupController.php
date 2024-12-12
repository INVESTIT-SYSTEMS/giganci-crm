<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Location;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{


    public function index(Request $request)
    {
        $savedLocations = Location::all();
        $savedTeachers = Teacher::all();
        $query = Group::when($request->get('search'), function (Builder $query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->orWhere('name', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('classes_day', 'like', '%' . $request->get('search') . '%')
                    ->orWhere('classes_hour', 'like', '%' . $request->get('search') . '%');
            });
        })->when($request->get('Location'), function ($query) use ($request) {
            $query->where('location_id', $request->get('Location'));
        })
            ->when($request->get('Teacher'), function ($query) use ($request) {
                $query->where('teacher_id', $request->get('Teacher'));
            })
            ->get();


        return view('wpgroup', ['group' => $query, 'location' => $savedLocations, 'teacher' => $savedTeachers]);

    }


    public function create()
    {
        $teacher = Teacher::all();
        $location = Location::all();
        return view('Layout_forms.GroupAddingForm', ['teachers' => $teacher, 'locations' => $location]);
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'classes_day' => 'required',
            'classes_hour' => 'required',
        ]);
        Group::create([
            'name' => $request->get('name'),
            'classes_day' => $request->get('classes_day'),
            'classes_hour' => $request->get('classes_hour'),
            'teacher_id' => $request->get('teacher_id'),
            'location_id' => $request->get('location_id'),
        ]);
        return redirect()->route('groups.index');
    }


    public function show(Group $group)
    {
        return view('groupView', [
            'student' => Student::where("group_id", $group->id)->get(),
            'location' => Location::all(),
            'group' => $group,
        ]);
    }


    public function edit(Group $group): View
    {
        $teacher = Teacher::all();
        $location = Location::all();
        return view('Layout_forms.GroupEditForm', ['groups' => $group, 'teachers' => $teacher, 'locations' => $location]);
    }


    public function update(Request $request, Group $group): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'classes_day' => 'required',
            'classes_hour' => 'required',
        ]);
        $group->update([
            'name' => $request->get('name'),
            'classes_day' => $request->get('classes_day'),
            'classes_hour' => $request->get('classes_hour'),
            'teacher_id' => $request->get('teacher_id'),
            'location_id' => $request->get('location_id'),
        ]);
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group): RedirectResponse
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
}

