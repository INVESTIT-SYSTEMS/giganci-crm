<?php

namespace App\Http\Controllers;

use App\Models\PotentialStudent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PotentialStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function PotentialList(): View
   {
       $data = PotentialStudent::all();
       return view('wppotential', ['user' => $data]);
   }

   public function index(): View
    {
        return view('Layout_forms.PotentialStudentAddingForm');

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
    public function store(Request $request): RedirectResponse
    {
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
            return redirect()->route('pStudent.index');
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
    public function edit(PotentialStudent $addPStudent)
    {
        return view('Layout_forms.PotentialStudentEditForm', ['user' => $addPStudent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PotentialStudent $addPStudent)
    {
        $addPStudent->update([
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
        return redirect()->route('pStudent.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PotentialStudent $addPStudent)
    {
        $addPStudent -> delete();
        return redirect()->route('pStudent.index');
    }
}
