<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $orgId = auth()->user()->organization_id;
        $services = Service::where('organization_id', $orgId)->get();

        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $orgId = auth()->user()->organization_id;

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['organization_id'] = $orgId;

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $orgId = auth()->user()->organization_id;
        $service = Service::where('organization_id', $orgId)->findOrFail($id);

        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $orgId = auth()->user()->organization_id;

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service = Service::where('organization_id', $orgId)->findOrFail($id);
        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $orgId = auth()->user()->organization_id;
        $service = Service::where('organization_id', $orgId)->findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
