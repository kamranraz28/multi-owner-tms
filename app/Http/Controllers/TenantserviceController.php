<?php

namespace App\Http\Controllers;

use App\Events\InvoiceLinkRequested;
use App\Models\Service;
use App\Models\Tenant;
use App\Models\Tenantservice;
use Illuminate\Http\Request;

class TenantserviceController extends Controller
{
    public function services($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($id);
        $tenantServices = $tenant->tenantServices()->with('service')->get();

        return view('tenantservices.index', compact('tenantServices'));
    }

    public function create()
    {
        $orgId = auth()->user()->organization_id;
        $services = Service::where('organization_id', $orgId)->get();
        $tenants = Tenant::where('organization_id', $orgId)->get();

        return view('tenantservices.create', compact('services', 'tenants'));
    }

    public function store(Request $request)
    {
        $orgId = auth()->user()->organization_id;

        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'service_id' => 'required|exists:services,id',
            'value' => 'required|string|max:255',
        ]);

        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($request->tenant_id);

        Tenantservice::create($request->all());

        return redirect()->back()->with('success', 'Tenant Service created successfully.');
    }

    public function edit($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenantService = Tenantservice::findOrFail($id);

        $tenant = Tenant::where('organization_id', $orgId)->findOrFail($tenantService->tenant_id);

        $services = Service::where('organization_id', $orgId)->get();
        $tenants = Tenant::where('organization_id', $orgId)->get();

        return view('tenantservices.edit', compact('tenantService', 'services', 'tenants'));
    }

    public function update(Request $request, $id)
    {
        $orgId = auth()->user()->organization_id;

        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'service_id' => 'required|exists:services,id',
            'value' => 'required|string|max:255',
        ]);

        Tenant::where('organization_id', $orgId)->findOrFail($request->tenant_id);

        $tenantService = Tenantservice::findOrFail($id);
        $tenantService->update($request->all());

        return redirect()->back()->with('success', 'Tenant Service updated successfully.');
    }

    public function destroy($id)
    {
        $orgId = auth()->user()->organization_id;
        $tenantService = Tenantservice::findOrFail($id);

        Tenant::where('organization_id', $orgId)->findOrFail($tenantService->tenant_id);

        $tenantService->delete();

        return redirect()->back()->with('success', 'Tenant Service deleted successfully.');
    }

    public function invoice()
    {
        event(new InvoiceLinkRequested());

        return redirect()->back()->with('success', 'Invoice link sent successfully via SMS.');
    }
}
