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
            'idCalonKaryawan' => '1',
            'nama' => 'John Doe',
            'umur' => 25,
            'jenisKelamin' => 'pria',
            'riwayatPendidikan' => 'sarjana1',
            'ratingPenampilan' => 85,
            'jumlahSertifikat' => 3,
            'skorPraktik' => 90,
            'alamat' => 'Jl. Sudirman No. 123, Jakarta',
        ]);
    }
}
