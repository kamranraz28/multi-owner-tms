<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $authId = auth()->id();
        $orgId = auth()->user()->organization_id;

        $transitionStatus = Transaction::where('user_id', $authId)
            ->where('organization_id', $orgId)
            ->whereIn('status', ['approved', 'pending'])
            ->value('id');

//        dd($transitionStatus);

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
