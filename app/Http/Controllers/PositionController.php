<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    //
    public function index()
    {
        // Logic to list all positions
<<<<<<< HEAD
        $positions = Position::all();
=======
        $auth_id = auth()->id();
        $positions = Position::where('organization_id',$auth_id)->get();
>>>>>>> c57bb21 (subscription module)
        return view('positions.index', compact('positions'));
    }
    public function create()
    {
        // Logic to show the form for creating a new position
        return view('positions.create');
    }
    public function store(Request $request)
    {
        // Logic to store a new position
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
<<<<<<< HEAD

=======
        $data['organization_id'] = auth()->id();
>>>>>>> c57bb21 (subscription module)
        // Assuming you have a Position model
        Position::create($data);

        return redirect()->route('positions.index')->with('success', 'Position created successfully.');
    }
    public function edit($id)
    {
        // Logic to show the form for editing an existing position
<<<<<<< HEAD
=======

>>>>>>> c57bb21 (subscription module)
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }
    public function update(Request $request, $id)
    {
        // Logic to update an existing position
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
<<<<<<< HEAD

=======
        $data['organization_id'] = auth()->id();
>>>>>>> c57bb21 (subscription module)
        $position = Position::findOrFail($id);
        $position->update($data);

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }
    public function destroy($id)
    {
        // Logic to delete a position
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
