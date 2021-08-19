<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class EntrustController extends Controller
{
    public function createRole(Request $request) 
    {
        $data = $request->all();

        $role = new Role();
        $role->name = $data['name'];
        $role->display_name = $data['display_name'];
        $role->description = $data['description'];
        $role->save();

        return response([
            'message' => 'Create role success'
        ]);
    }

    public function createPermission(Request $request) 
    {
        $data = $request->all();

        $permission = new Permission();
        $permission->name = $data['name'];
        $permission->display_name = $data['display_name'];
        $permission->description = $data['description'];
        $permission->save();

        return response([
            'message' => 'Create permission success'
        ]);
    }

    public function listRole()
    {
        return response([
            'data' => Role::all()
        ]);
    }

    public function listPermission()
    {
        return response([
            'data' => Permission::all()
        ]);
    }

    public function assignUserRole(Request $request)
    {
        $req = $request->all();

        $user = User::find($req['user_id'])->first();
        $role = Role::find($req['role_id'])->first();

        $user->attachRole($role);

        return response([
            'message' => 'Assign role to user success'
        ]);
    }

    public function assignRolePermission(Request $request)
    {
        $req = $request->all();

        $role = Role::find($req['role_id'])->first();
        $permission = Role::find($req['permission_id'])->first();

        $role->attachPermission($role);

        return response([
            'message' => 'Assign permission to role success'
        ]);
    }
}
