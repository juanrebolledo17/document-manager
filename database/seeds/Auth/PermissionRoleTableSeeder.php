<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Role::create(['name' => config('access.users.admin_role')]);
    	$user = Role::create(['name' => config('access.users.default_role')]);

    	$permissions = ['view backend', 'manage users', 'manage documents'];

    	foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
      }

      $admin->givePermissionTo(Permission::all());

      $user->givePermissionTo('view backend');
      $user->givePermissionTo('manage documents');
    }
}
