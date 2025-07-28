<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index()
    {
        // All roles
        $roles = Role::all();
        return Inertia::render('Admin/Roles/Index', [
            'roles' => $roles,
        ]);
    }

    public function edit(Role $role)
    {
        // All permissions, mark those that are assigned
        $permissions = Permission::all()->map(function($perm) use ($role) {
        return [
            'id' => $perm->id,
            'name' => $perm->name,
            'group' => ucfirst(explode('.', $perm->name)[0]),
            'checked' => $role->hasPermissionTo($perm),
                ];
        });

        return Inertia::render('Admin/Roles/Edit', [
            'role' => $role,
            'permissions' => $permissions->groupBy('group'),
            ]);

    }

    public function updatePermissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role->syncPermissions($request->permissions);
        return redirect()->route('admin.roles.edit', $role)->with('success', 'Permissions updated.');
    }
}