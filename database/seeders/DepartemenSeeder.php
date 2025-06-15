<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User\UserModel;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create([
            'image_divisi' => '',
            'name_divisi' => 'Eksternal'
        ]);

        UserModel::create([
            'image_divisi' => '',
            'name_divisi' => 'Acara'
        ]);

        UserModel::create([
            'image_divisi' => '',
            'name_divisi' => 'PDD'
        ]);

        UserModel::create([
            'image_divisi' => '',
            'name_divisi' => 'Internal'
        ]);
    }
}
