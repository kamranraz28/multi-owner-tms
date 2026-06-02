<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    //
    public function index()
    {
<<<<<<< HEAD
        $tenants = Tenant::with('property')->get();
=======
        $auth_id = auth()->id();
        $tenants = Tenant::where('organization_id',$auth_id)->get();
>>>>>>> c57bb21 (subscription module)
        return view('tenants.index', compact('tenants'));
    }
    public function create()
    {
<<<<<<< HEAD
        $properties = Property::all();
=======
        $auth_id = auth()->id();
        $properties = Property::where('organization_id',$auth_id)->get();
>>>>>>> c57bb21 (subscription module)
        return view('tenants.create',compact('properties'));
    }
    public function store(Request $request)
    {
<<<<<<< HEAD
        //dd($request->all());
=======
>>>>>>> c57bb21 (subscription module)
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'nid_number' => 'required|string|max:20',
            'nid_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'property_id' => 'required|exists:properties,id',
<<<<<<< HEAD
        ]);

        $tenant = new Tenant($request->all());
=======
        ], [
            'name.required' => 'Tenant name is required.',
            'phone.required' => 'Phone number is required.',
            'nid_number.required' => 'NID number is required.',
            'property_id.required' => 'Property is required.',
            'property_id.exists' => 'Selected property does not exist.',
            'nid_upload.mimes' => 'NID file must be jpg, jpeg, png or pdf.',
            'nid_upload.max' => 'NID file size must be less than 2MB.',
        ]);

        $data = $request->all();

        // organization id add
        $data['organization_id'] = auth()->id();

        // correct data use
        $tenant = new Tenant($data);
>>>>>>> c57bb21 (subscription module)

        if ($request->hasFile('nid_upload')) {
            $tenant->nid_upload = $request->file('nid_upload')->store('uploads', 'public');
        }

        $tenant->save();

<<<<<<< HEAD
        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
=======
        return redirect()->route('tenants.index')
            ->with('success', 'Tenant created successfully.');
>>>>>>> c57bb21 (subscription module)
    }
    public function edit($id)
    {
        $tenant = Tenant::findOrFail($id);
        $properties = Property::all();
        return view('tenants.edit', compact('tenant', 'properties'));
    }
    public function update(Request $request, $id)
    {
        $tenant = Tenant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:255',
            'nid_number' => 'required|string|max:20',
            'nid_upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'property_id' => 'required|exists:properties,id',
        ]);

<<<<<<< HEAD
        $tenant->fill($request->all());
=======
        // validated data use
        $data = $request->all();

        // organization id add
        $data['organization_id'] = auth()->id();

        // fill correct data
        $tenant->fill($data);
>>>>>>> c57bb21 (subscription module)

        if ($request->hasFile('nid_upload')) {
            $tenant->nid_upload = $request->file('nid_upload')->store('uploads', 'public');
        }

        $tenant->save();

<<<<<<< HEAD
        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
=======
        return redirect()->route('tenants.index')
            ->with('success', 'Tenant updated successfully.');
>>>>>>> c57bb21 (subscription module)
    }
    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
    }

    public function monthChange($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->invoice_month = !$tenant->invoice_month;
        $tenant->save();

        return redirect()->back()->with('success', 'Invoice month status updated successfully.');
    }
}
