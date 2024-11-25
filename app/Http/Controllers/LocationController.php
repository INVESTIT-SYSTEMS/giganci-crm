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
        Location::create([
            'town' => $request->get('town'),
        ]);
        return redirect()->route('Location.index');
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
        return view('Layout_forms.LocationEditForm', ['location' => $location]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $location -> update([
            'town' => $request->get('town'),
        ]);
        return redirect()->route('Location.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location -> delete();
        return redirect()->route('Location.index');
    }

}
