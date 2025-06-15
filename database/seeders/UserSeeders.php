<?php

namespace Database\Seeders;
use App\Models\Admin\AdminModel;
use App\Models\User\UserModel;

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

        $divisi1 = UserModel::create(['name_divisi' => 'PDD']);
        $divisi2 = UserModel::create(['name_divisi' => 'Internal']);

        AdminModel::create([
            'image' => '',
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => null,
            'role' => 'admin',
        ]);

        AdminModel::create([
            'image' => '',
            'name' => 'Divisi PDD',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => $divisi1->id,
            'role' => 'user',
        ]);

        AdminModel::create([
            'image' => '',
            'name' => 'Divisi Internal',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => $divisi2->id,
            'role' => 'user',
        ]);

        AdminModel::create([
            'image' => '',
            'name' => 'Bendahara',
            'email' => 'bendahara123@gmail.com',
            'password' => Hash::make('password'),
            'divisi_id' => null,
            'role' => 'bendahara',
        ]);

        AdminModel::create([
            'image' => '',
            'name' => 'Azis',
            'email' => 'bendahara@gmail.com',
            'password' => Hash::make('password123'),
            'divisi_id' => null,
            'role' => 'bendahara',
        ]);

        AdminModel::create([
            'image' => '',
            'name' => 'Khopid',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'divisi_id' => null,
            'role' => 'admin',
        ]);
    }
}
