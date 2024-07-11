<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'	=> 'Superadmin',
            'email'	=> 'admin1@gmail.com',
            'password'	=> bcrypt('12345678')
        ]);

        User::create([
            'name'	=> 'Admin',
            'email'	=> 'admin2@gmail.com',
            'password'	=> bcrypt('12345678')
        ]);
    }
}
