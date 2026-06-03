<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $orgId = auth()->user()->organization_id;
        $properties = Property::with('position')
            ->where('organization_id', $orgId)
            ->get();

        return view('properties.index', compact('properties'));
    }

    public function show($id)
    {
        $orgId = auth()->user()->organization_id;
        $property = Property::with('position', 'tenant')
            ->where('organization_id', $orgId)
            ->findOrFail($id);

        return view('properties.show', compact('property'));
    }

    public function create()
    {
        $orgId = auth()->user()->organization_id;
        $positions = Position::where('organization_id', $orgId)->get();

        return view('properties.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $orgId = auth()->user()->organization_id;

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'address' => 'nullable|string|max:255',
        ]);

        $data['organization_id'] = $orgId;

        Property::create($data);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function edit($id)
    {
        $orgId = auth()->user()->organization_id;
        $property = Property::where('organization_id', $orgId)->findOrFail($id);
        $positions = Position::where('organization_id', $orgId)->get();

        return view('properties.edit', compact('property', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $orgId = auth()->user()->organization_id;

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,id',
            'address' => 'nullable|string|max:255',
        ]);

        $property = Property::where('organization_id', $orgId)->findOrFail($id);
        $property->update($data);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        $orgId = auth()->user()->organization_id;
        $property = Property::where('organization_id', $orgId)->findOrFail($id);
        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
