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
            'username' => 'Bendahara',
            'email' => 'bendahara123@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => null,
            'role' => 'bendahara',
        ]);
    }
}
