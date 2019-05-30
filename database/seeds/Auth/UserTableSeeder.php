<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Add the master administrator, user id of 1
      User::create([
          'name'        => 'Juan',
          'email'             => 'admin@admin.com',
          'password'          => bcrypt('secret'),
      ]);

      User::create([
          'name'        => 'Default user',
          'email'             => 'user@user.com',
          'password'          => bcrypt('secret'),
      ]);
    }
}
