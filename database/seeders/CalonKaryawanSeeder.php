<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalonKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('CalonKaryawan')->insert([
            'image' => 'path/to/image.jpg',
            'idCalonKaryawan' => '1',
            'nama' => 'John Doe',
            'umur' => 30,
            'jenisKelamin' => 'pria',
            'riwayatPendidikan' => 'sarjana1',
            'alamat' => 'Jl. Sudirman No. 123, Jakarta',
            'latitude' => -6.200000,
            'longitude' => 106.816666
        ]);
    }
}
