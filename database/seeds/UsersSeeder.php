<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            [
                'name' => 'Doanh',
                'email' => 'doanhdev@gmail.com',
                'role' => 'admin',
                'password' => 'admin123',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => 'user123',
            ]
        ] as $user) {
            User::firstOrCreate([
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'],
            ],[
                'password' => bcrypt($user['password']),
            ]);
        }
    }
}

