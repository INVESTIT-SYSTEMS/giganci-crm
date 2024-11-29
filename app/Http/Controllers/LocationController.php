<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $location = Location::all();
        return view('wplocation', ['location' => $location]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Layout_forms.LocationAddingForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'town' => 'required',
        ]);
        Location::create([
            'town' => $request->get('town'),
        ]);
        return redirect()->route('locations.index');
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
    public function edit(Location $location)
    {
        return view('Layout_forms.LocationEditForm', ['locations' => $location]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'town' => 'required',
        ]);

        $location -> update([
            'town' => $request->get('town'),
        ]);
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location -> delete();
        return redirect()->route('locations.index');
    }

}
