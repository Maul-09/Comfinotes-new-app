<?php

namespace Database\Seeders;

use App\Models\Auth\AuthModel;
use App\Models\User\DepartemenModel;

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

        AuthModel::create([
            'image' => '',
            'username' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => null,
            'role' => 'admin',
        ]);

        AuthModel::create([
            'image' => '',
            'username' => 'Divisi PDD',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => 1,
            'role' => 'user',
        ]);

        AuthModel::create([
            'image' => '',
            'username' => 'Divisi Internal',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => 2,
            'role' => 'user',
        ]);

        AuthModel::create([
            'image' => '',
            'username' => 'Bendahara',
            'email' => 'bendahara123@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => null,
            'role' => 'bendahara',
        ]);

        AuthModel::create([
            'image' => '',
            'username' => 'Azis',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('password123'),
            'divisi_id' => null,
            'role' => 'bendahara',
        ]);

        AuthModel::create([
            'image' => '',
            'username' => 'Khopid',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'divisi_id' => null,
            'role' => 'admin',
        ]);
    }
}
