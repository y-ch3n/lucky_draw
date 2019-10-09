<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersAndRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'description' => 'System Admin'
        ]);

        $user = User::where('email', 'admin@test.com')->first();
        $role = Role::where('name', 'admin')->first();
        $user->roles()->sync($role->id);
    }
}
