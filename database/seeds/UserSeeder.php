<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
            'name'=> 'admin',
            'email'=>'admin@test.com',
            'password'=>bcrypt('password'),
            'roles_id'=>1
            ]);
        $admin->assignRole('admin');

        $user=User::create([
            'name'=> 'user',
            'email'=>'user@test.com',
            'password'=>bcrypt('password'),
            'roles_id'=>2
            ]);
        $user->assignRole('user');
    }
}
