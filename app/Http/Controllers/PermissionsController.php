<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function roles()
    {
        return Role::with('permissions')->get();
    }
    public function permissions()
    {
        return Permission::all();
    }
    public function addRolePermission(Role $role, Permission $permission)
    {
        $role->givePermissionTo($permission);
    }
    public function syncRolePermissions(Role $role, Request $request)
    {
        $permissionIds = $request->input('permissionIds');
        $role->syncPermissions($permissionIds);
    }
    public function removeRolePermission(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);
    }
    public function showRolePermissions(Role $role)
    {
        return $role->permissions;
    }
    public function showUserPermissions(User $user)
    {
        return $user->getAllPermissions();
    }
    public function assignRoleToUser(User $user, Role $role)
    {
        $user->assignRole($role);
    }

    public function createPermission($name)
    {
        Permission::create(['name' => $name]);
    }
}
