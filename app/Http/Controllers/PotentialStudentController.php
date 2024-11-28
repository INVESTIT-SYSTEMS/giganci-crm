<?php

namespace App\Http\Controllers;

use App\Models\PotentialStudent;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PotentialStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

   public function index(Request $request): View
    {
        $query = PotentialStudent::query();
        if (request()->has('status') || request()->has('search')){
            $status = request()->get('status','');
            $search = request()->get('search','');
            $query->where('status','like',"%$status%")->where('name', 'like', "%$search$");
        }
//       $query = PotentialStudent::when($request->has('status'), function ( Builder $q){
//           $q->
//       })
//           ->


        $status = request()->get('status','');
        $data = $query -> get();
        return view('wppotential', ['user' => $data, 'status'=>$status]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('Layout_forms.PotentialStudentAddingForm');
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
            return redirect()->route('potentialStudents.index');
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
    public function edit(PotentialStudent $potentialStudent)
    {
        return view('Layout_forms.PotentialStudentEditForm', ['user' => $potentialStudent]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PotentialStudent $potentialStudent)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PotentialStudent $potentialStudent)
    {
        $potentialStudent -> delete();
        return redirect()->route('potentialStudents.index');
    }
}
