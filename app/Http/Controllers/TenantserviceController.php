<?php

namespace App\Http\Controllers;

use App\Events\InvoiceLinkRequested;
use App\Models\Service;
use App\Models\Tenant;
use App\Models\Tenantservice;
use Illuminate\Http\Request;


class TenantserviceController extends Controller
{
    //
    public function services($id)
    {

        $tenant = Tenant::findOrFail($id);
        $tenantServices = $tenant->tenantServices()->with('service')->get();
        return view('tenantservices.index', compact('tenantServices'));
    }
    public function create()
    {
<<<<<<< HEAD
        $services = Service::all();
        $tenants = Tenant::all();
=======
        $auth_id = auth()->id();
//        dd($auth_id);
        $services = Service::where('organization_id',$auth_id)->get();
        $tenants = Tenant::where('organization_id',$auth_id)->get();
>>>>>>> c57bb21 (subscription module)
        return view('tenantservices.create',compact('services', 'tenants'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'service_id' => 'required|exists:services,id',
            'value' => 'required|string|max:255',
        ]);

        Tenantservice::create($request->all());
        return redirect()->back()->with('success', 'Tenant Service created successfully.');
    }
<<<<<<< HEAD
    public function edit($id)
    {
        $tenantService = Tenantservice::findOrFail($id);
        $services = Service::all();
        $tenants = Tenant::all();
=======

    public function edit($id)
    {
        $tenantService = Tenantservice::findOrFail($id);
        $auth_id = auth()->id();
        $services = Service::where('organization_id',$auth_id)->get();
        $tenants = Tenant::where('organization_id',$auth_id)->get();
>>>>>>> c57bb21 (subscription module)
        return view('tenantservices.edit', compact('tenantService', 'services', 'tenants'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'service_id' => 'required|exists:services,id',
            'value' => 'required|string|max:255',
        ]);

        $tenantService = Tenantservice::findOrFail($id);
        $tenantService->update($request->all());
        return redirect()->back()->with('success', 'Tenant Service updated successfully.');
    }
    public function destroy($id)
    {
        $tenantService = Tenantservice::findOrFail($id);
        $tenantService->delete();
        return redirect()->back()->with('success', 'Tenant Service deleted successfully.');
    }

<<<<<<< HEAD
    public function invoice()
    {
        event(new InvoiceLinkRequested());

=======
    // manually
    public function invoice()
    {
        $ownerId = auth()->id();
        $tenants = Tenant::where('organization_id', $ownerId)->get();
        event(new InvoiceLinkRequested($tenants));
>>>>>>> c57bb21 (subscription module)
        return redirect()->back()->with('success', 'Invoice link sent successfully via SMS.');
    }
}
