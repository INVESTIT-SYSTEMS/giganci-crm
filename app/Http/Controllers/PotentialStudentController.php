<?php

namespace App\Http\Controllers;

use App\Models\PotentialStudent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PotentialStudentController extends Controller
{
   public function index(Request $request)
    {
        $query = PotentialStudent::
        when($request->get('search'), function (Builder $query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->orwhere('name', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('surname', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('birth_year', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('comment', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('parent_name', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('parent_surname', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('parent_phone_number', 'like', '%' . $request->get('search') . '%')
                    ->orwhere('parent_email', 'like', '%' . $request->get('search') . '%');
            });
        })->when($request->get('status'), function ($query) use ($request){
            $query->where('status', $request->get('status'));
        })
            ->get();
        return view('wppotential', ['user' => $query]);

    }

    public function create(): View
    {
        return view('Layout_forms.PotentialStudentAddingForm');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|numeric',
            'status' => 'required',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|numeric',
        ]);

        PotentialStudent::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'birth_year' => $request->get('birth_year'),
            'status' => $request->get('status'),
            'comment' => $request->get('comment'),
            'parent_name' => $request->get('parent_name'),
            'parent_surname' => $request->get('parent_surname'),
            'parent_phone_number' => $request->get('parent_phone_number'),
            'parent_email' => $request->get('parent_email'),
        ]);
            return redirect()->route('potentialStudents.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(PotentialStudent $potentialStudent)
    {
        return view('Layout_forms.PotentialStudentEditForm', ['user' => $potentialStudent]);
    }

    public function update(Request $request, PotentialStudent $potentialStudent)
    {
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birth_year' => 'required|numeric',
            'status' => 'required',
            'parent_name' => 'required',
            'parent_surname' => 'required',
            'parent_phone_number' => 'required|numeric',
        ]);
        $potentialStudent->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'birth_year' => $request->get('birth_year'),
            'status' => $request->get('status'),
            'comment' => $request->get('comment'),
            'parent_name' => $request->get('parent_name'),
            'parent_surname' => $request->get('parent_surname'),
            'parent_phone_number' => $request->get('parent_phone_number'),
            'parent_email' => $request->get('parent_email'),
        ]);
        return redirect()->route('potentialStudents.index');
    }

    public function destroy(PotentialStudent $potentialStudent)
    {
        $potentialStudent -> delete();
        return redirect()->route('potentialStudents.index');
    }
}
