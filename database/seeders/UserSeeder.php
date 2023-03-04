<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'admin',
            ],
            [
                'name' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'manager',
            ],
            [
                'name' => 'kasir',
                'email' => 'kasir@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'kasir',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
