<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Kriteria')->insert([
            'idKriteria' => 'K1',
            'namaKriteria' => 'Riwayat Pendidikan',
            'tipe' => 'Benefit',
            'bobot' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
