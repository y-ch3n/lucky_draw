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
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'John',
                'email' => 'john@test.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Carol',
                'email' => 'carol@test.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Kenny',
                'email' => 'kenny@test.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Jason',
                'email' => 'jason@test.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Sean',
                'email' => 'sean@test.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Lisa',
                'email' => 'lisa@test.com',
                'password' => bcrypt('password')
            ]
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'description' => 'System Admin'
            ],
            [
                'name' => 'member',
                'description' => 'Member'
            ]
        ]);

        $user = User::where('email', 'admin@test.com')->first();
        $role = Role::where('name', 'admin')->first();
        $user->roles()->sync($role->id);

        $users = User::where('email', '<>', 'admin@test.com')->get();
        $role = Role::where('name', 'member')->first();

        $users->map(function ($user) use ($role)
        {
            $user->roles()->sync($role->id);
        });
    }
}
