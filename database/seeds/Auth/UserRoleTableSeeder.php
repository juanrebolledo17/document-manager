<?php

use Illuminate\Database\Seeder;
use App\User;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::find(1)->assignRole(config('access.users.admin_role'));
        User::find(2)->assignRole(config('access.users.default_role'));;
    }
}
