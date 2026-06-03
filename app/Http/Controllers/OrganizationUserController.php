<?php

namespace App\Http\Controllers;

use App\Models\OrganizationUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OrganizationUserController extends Controller
{
    public function index()
    {
        $orgId = auth()->user()->organization_id;
        $organizationUsers = OrganizationUser::where('organization_id', $orgId)->get();

        return view('organizationUsers.index', compact('organizationUsers'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('organizationUsers.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string|max:20',
            'organization_id' => 'nullable|exists:organizations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);
        OrganizationUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'organization_id' => auth()->user()->organization_id,
            'user_id' => auth()->user()->id,
            'role_id' => $request->role_id,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('organizationUser.index')
            ->with('success', 'Organization User created successfully!');
    }
}
