<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::all();
        return view('wplocation', ['location' => $location]);
    }

    public function create()
    {
        return view('Layout_forms.LocationAddingForm');
    }

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

    public function show(string $id)
    {
        //
    }

    public function edit(Location $location)
    {
        return view('Layout_forms.LocationEditForm', ['locations' => $location]);
    }

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

    public function destroy(Location $location)
    {
        $location -> delete();
        return redirect()->route('locations.index');
    }
}
