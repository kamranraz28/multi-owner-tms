<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    //
    public function index()
    {
        // Logic to list all properties
<<<<<<< HEAD
        $properties = Property::with('position')->get();
=======
        $auth_user = auth()->id();
        $properties = Property::where('organization_id',$auth_user)->get();
>>>>>>> c57bb21 (subscription module)
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        // Logic to show the form for creating a new property
<<<<<<< HEAD
        $positions = Position::all();
=======
        $auth_user = auth()->id();
        $positions = Position::where('organization_id',$auth_user)->get();
>>>>>>> c57bb21 (subscription module)
        return view('properties.create', compact('positions'));
    }
    public function store(Request $request)
    {
        // Logic to store a new property
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'address' => 'nullable|string|max:255',
        ]);
<<<<<<< HEAD

=======
        $data['organization_id'] = auth()->id();
>>>>>>> c57bb21 (subscription module)
        Property::create($data);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }
    public function edit($id)
    {
        // Logic to show the form for editing an existing property
        $property = Property::findOrFail($id);
        $positions = Position::all();
        return view('properties.edit', compact('property', 'positions'));
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing property
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'address' => 'nullable|string|max:255',
        ]);
<<<<<<< HEAD

=======
        $data['organization_id'] = auth()->id();
>>>>>>> c57bb21 (subscription module)
        $property = Property::findOrFail($id);
        $property->update($data);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete a property
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
