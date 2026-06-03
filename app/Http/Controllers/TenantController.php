<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $orgId = auth()->user()->organization_id;
        $tenants = Tenant::with('property')
            ->where('organization_id', $orgId)
            ->get();

        return view('tenants.index', compact('tenants'));
    }

    public function show($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::with('property', 'tenantServices.service', 'payments')
            ->where('organization_id', $orgId)
            ->findOrFail($id);

        return view('tenants.show', compact('tenant'));
    }

    public function create()
    {
        $orgId = auth()->user()->organization_id;
        $properties = Property::where('organization_id', $orgId)->get();

        return view('tenants.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $orgId = auth()->user()->organization_id;

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'nid_number' => 'required|string|max:20',
            'nid_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'property_id' => 'required|exists:properties,id',
        ]);

        $data = $request->all();
        $data['organization_id'] = $orgId;

        $tenant = new Tenant($data);

        if ($request->hasFile('nid_upload')) {
            $tenant->nid_upload = $request->file('nid_upload')->store('uploads', 'public');
        }

        $tenant->save();

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
    }

    public function edit($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);
        $properties = Property::where('organization_id', $orgId)->get();

        return view('tenants.edit', compact('tenant', 'properties'));
    }

    public function update(Request $request, $id)
    {
        $orgId = auth()->user()->organization_id;

        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'nid_number' => 'required|string|max:20',
            'nid_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'property_id' => 'required|exists:properties,id',
        ]);

        $data = $request->all();
        $data['organization_id'] = $orgId;

        $tenant->fill($data);

        if ($request->hasFile('nid_upload')) {
            $tenant->nid_upload = $request->file('nid_upload')->store('uploads', 'public');
        }

        $tenant->save();

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
    }

    public function destroy($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
    }

    public function monthChange($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);
        $tenant->invoice_month = !$tenant->invoice_month;
        $tenant->save();

        return redirect()->back()->with('success', 'Invoice month status updated successfully.');
    }
}
