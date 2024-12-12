<?php

namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\PotentialStudent;
use App\Models\Student;
use App\Models\Group;
use App\Models\User;
use Cassandra\Custom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {

        $savedGroups = Group::all();
        $savedLocations = Location::all();
        $query = Student::
        when($request->get('search'), function (Builder $query) use ($request){
            $query->where(function ($query)use ($request){
                $query->orWhere('name','like','%' . $request->get('search') . '%')
                ->orWhere('surname','like','%' . $request->get('search') . '%')
                ->orWhere('birth_year','like','%' . $request->get('search') . '%')
                ->orWhere('parent_name','like','%' . $request->get('search') . '%')
                ->orWhere('parent_surname','like','%' . $request->get('search') . '%')
                ->orWhere('parent_phone_number','like','%' . $request->get('search') . '%')
                ->orWhere('parent_email','like','%' . $request->get('search') . '%');
            });
        })->when($request->get('NameGroup'), function ($query) use ($request) {
            $query->where('group_id', $request->get('NameGroup'));
        })
            ->get();


        return view('wpstudent', ['student' => $query, 'group' => $savedGroups, 'location' => $savedLocations]);
    }

    public function create()
    {
        $saved_students = Student::all();
        $locations = Location::all();
        $groups= Group::all();
        return view('Layout_forms.StudentAddingForm', ['student'=>$saved_students, 'group'=>$groups, 'location'=>$locations]);
    }

    public function store(Request $request)
    {
        $groups = Group::all();

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
        return redirect()->route('students.index' , ['groups'=>$groups]);
    }

    public function show(Request $request)
    {
        //
    }

    public function edit(Student $student)
    {
        $savedLocations = Location::all();
        $groups= Group::all();
        return view('Layout_forms.StudentEdit', [
            'student'=>$student,
            'group'=>$groups,
            'locaton'=>$savedLocations,
        ]);
    }

    public function update(Student $student, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|numeric',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|numeric',
        ]);
        $student->update([
            'name'=>$request->get('name'),
            'surname'=>$request->get('surname'),
            'birth_year'=>$request->get('birth_year'),
            'parent_name'=>$request->get('parent_name'),
            'parent_surname'=>$request->get('parent_surname'),
            'parent_phone_number'=>$request->get('parent_phone_number'),
            'parent_email'=>$request->get('parent_email'),
            'group_id'=>$request->get('group_id'),
        ]);

        return redirect(route('students.index'))->with('success', 'Updated');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('students.index'));
    }
    public function moveStudent(PotentialStudent $studentData): View
    {
        $groups = Group::all();
        return view('Layout_forms.MoveStudentForm', ['studentData'=>$studentData, 'group'=>$groups]);
    }

    public function FindNumber(Request $request)
    {
        $savedGroups = Group::all();
        $savedLocations = Location::all();
        $studentQuery = Student::where('parent_phone_number', 'like', '%'.$request->FindNumber.'%')->get();
        $potentialQuery = PotentialStudent::where('parent_phone_number', 'like', '%'.$request->FindNumber.'%')->get();

        if (!empty($studentQuery->toArray())){
            return view('wpstudent', [
                'student' => $studentQuery,
                'group' => $savedGroups,
                'location' => $savedLocations]);

        }else if (!empty($potentialQuery->toArray())){
            return view('wppotential', ['user' => $potentialQuery]);
        }

        return view('main')->with('send', 'Nie wyszukano podanych wartośći.');
    }

}
