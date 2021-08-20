<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class RoleBasedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newAdminUserId = $this->createAdminUser();
        $adminRoleId = $this->createAdminRole();
        $this->assignUserToRole($newAdminUserId, $adminRoleId);

        $newPurcashingUserId = $this->createPurcahsingUser();
        $purcashingRoleId = $this->createPurcashingRole();
        $this->assignUserToRole($newPurcashingUserId, $purcashingRoleId);

        $newListUserPermissionId = $this->createListUserPermission();
        $this->assingRoleToPermission($adminRoleId, $newListUserPermissionId);
    }

    private function createAdminUser()
    {
        $user = new User();
        $user->name = 'Ramdan';
        $user->email = 'ramdan@mail.com';
        $user->password = app('hash')->make('123');
        $user->remember_token = str_random(10);
        $user->save();

        return $user->id;
    }

    private function createAdminRole()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->display_name = 'Admin';
        $role->save();

        return $role->id;
    }

    private function assignUserToRole($userId, $roleId)
    {
        $user = User::find($userId);
        $role = Role::find($roleId);

        $user->attachRole($role);
    }

    private function createPurcahsingUser()
    {
        $user = new User();
        $user->name = 'Rudi';
        $user->email = 'rudi@mail.com';
        $user->password = app('hash')->make('321');
        $user->remember_token = str_random(10);
        $user->save();

        return $user->id;
    }

    private function createPurcashingRole()
    {
        $role = new Role();
        $role->name = 'purcashing';
        $role->display_name = 'Purcashing';
        $role->save();

        return $role->id;
    }

    private function createListUserPermission()
    {
        $permission = new Permission();
        $permission->name = 'list-user';
        $permission->display_name = 'View list user';
       $permission->save();
       
       return $permission->id;
    }

    private function assingRoleToPermission($roleId, $permissionId)
    {
        $role = Role::find($roleId);
        $permission = Permission::find($permissionId);

        $role->attachPermission($permission);
    }
}
