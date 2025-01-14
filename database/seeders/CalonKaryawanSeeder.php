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
            'idCalonKaryawan' => 'CK1',
            'nama' => 'Abel Indra',
            'umur' => 21,
            'jenisKelamin' => 'laki-laki',
            'riwayatPendidikan' => 'SMA',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
