<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'john doe',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'student'
            ],
            [
                'name' => 'instructor',
                'email' => 'instructor@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'instructor'
            ]
            ];


            User::insert($users);


    }
}
