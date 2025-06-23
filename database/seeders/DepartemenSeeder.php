<?php

namespace Database\Seeders;

use App\Models\User\DepartemenModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DepartemenModel::create([
            'image_divisi' => '',
            'name_divisi' => 'Eksternal'
        ]);

        DepartemenModel::create([
            'image_divisi' => '',
            'name_divisi' => 'Acara'
        ]);

        DepartemenModel::create([
            'image_divisi' => '',
            'name_divisi' => 'PDD'
        ]);

        DepartemenModel::create([
            'image_divisi' => '',
            'name_divisi' => 'Internal'
        ]);
    }
}
