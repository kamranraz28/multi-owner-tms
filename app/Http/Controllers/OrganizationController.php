<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('organizations.index',compact('organizations'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('organizations.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'phone'    => 'required',
            'email'    => 'required|email|unique:organizations,email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|exists:roles,id',
            'logo'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoName = null;

        // Upload Logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/users'), $logoName);
        }

        // Find Role
        $role = Role::findById($request->role);

        // Hash Password
        $hashedPassword = Hash::make($request->password);

        // =========================
        // Organization Create First
        // =========================

        $auth_user_id = auth()->id();
        $organization = Organization::create([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'password' => $hashedPassword,
            'role_id'  => $request->role,
            'user_id'  => $auth_user_id,
            'logo'     => $logoName,
        ]);

        // =========================
        // User Create
        // =========================
        $user = User::create([
            'name'            => $request->name,
            'email'           => $request->email,
            'password'        => $hashedPassword,
            'organization_id' => $organization->id,
        ]);

        // Assign Role
        $user->assignRole($role->name);

        return back()->with('success', 'Organization & User created successfully.');
    }

    public function destroy($id)
    {
        $organization = Organization::findOrFail($id);

        // delete logo file if exists
        if ($organization->logo && file_exists(public_path('uploads/users/' . $organization->logo))) {
            unlink(public_path('uploads/users/' . $organization->logo));
        }

        $organization->delete();

        return back()->with('success', 'Organization deleted successfully.');
    }

    public function edit($id)
    {
        $organization = Organization::findOrFail($id);
        $roles = Role::all();
        return view('organizations.edit', compact('organization','roles'));
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);

        // related user
        $user = User::findOrFail($organization->user_id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'role'  => 'required|exists:roles,id',
            'logo'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoName = $organization->logo;

        // Upload New Logo
        if ($request->hasFile('logo')) {

            if ($logoName && file_exists(public_path('uploads/users/' . $logoName))) {
                unlink(public_path('uploads/users/' . $logoName));
            }

            $file = $request->file('logo');

            $logoName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/users'), $logoName);
        }

        // =========================
        // Update User Table
        // =========================
        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Update password if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            $organization->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // =========================
        // Update Organization Table
        // =========================
        $organization->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role_id'  => $request->role,
            'logo'     => $logoName,
        ]);

        // =========================
        // Update Role
        // =========================
        $role = Role::findById($request->role);

        $user->syncRoles([$role->name]);

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Updated successfully');
    }}
