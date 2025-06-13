<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user123@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bendahara',
        ]);

        User::create([
            'name' => 'Azis',
            'email' => 'bendahar2@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bendahara',
        ]);

        User::create([
            'name' => 'Khopid',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bendahara',
        ]);
    }
}
