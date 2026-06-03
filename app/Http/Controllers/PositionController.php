<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $orgId = auth()->user()->organization_id;
        $positions = Position::where('organization_id', $orgId)->get();

        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $orgId = auth()->user()->organization_id;

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data['organization_id'] = $orgId;

        Position::create($data);

        return redirect()->route('positions.index')->with('success', 'Position created successfully.');
    }

    public function edit($id)
    {
        $orgId = auth()->user()->organization_id;
        $position = Position::where('organization_id', $orgId)->findOrFail($id);

        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, $id)
    {
        $orgId = auth()->user()->organization_id;

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $position = Position::where('organization_id', $orgId)->findOrFail($id);
        $position->update($data);

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy($id)
    {
        $orgId = auth()->user()->organization_id;
        $position = Position::where('organization_id', $orgId)->findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
