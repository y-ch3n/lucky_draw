<?php

use App\Role;
use Illuminate\Database\Seeder;

class WinningNumbersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'member')->first();
        $users = $role->users;
        $users->map(function($user)
        {
            $numbers = [];
            switch ($user->name) {
                case 'John':
                    $numbers =['2839', '2993', '9931', '0932', '9322'];
                    break;
                case 'Carol':
                    $numbers =['1234', '3404'];
                    break;
                case 'Kenny':
                    $numbers =['5678', '3939'];
                    break;
                case 'Jason':
                    $numbers =['9012', '3838', '4738'];
                    break;
                case 'Sean':
                    $numbers =['0000'];
                    break;
                case 'Lisa':
                    $numbers =['3748', '9393', '3782', '8301', '0138'];
                    break;
            }

            foreach ($numbers as $number) {
                $user->winningNumbers()->create(['number' => $number]);
            }
        });
    }
}
