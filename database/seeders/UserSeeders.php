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
            'image' => '',
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'image' => '',
            'name' => 'User',
            'email' => 'user123@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'image' => '',
            'name' => 'Bendahara',
            'email' => 'bendahara123@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'bendahara',
        ]);

        User::create([
            'image' => '',
            'name' => 'Azis',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'bendahara',
        ]);

        User::create([
            'image' => '',
            'name' => 'Khopid',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}
