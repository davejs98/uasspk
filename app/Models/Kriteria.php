<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

Class Kriteria{

    public function bacaKriteria(){
        $kriteria = DB::table("kriteria")->get();
        return $kriteria;
    }

    public function saveKriteria($x){
        DB::table('kriteria')->insert([
            'idKriteria' => $x -> idKriteria,
            'namaKriteria' => $x -> namaKriteria,
            'tipe' => $x -> tipe,
            'bobot' => $x -> bobot
        ]);
    }

    public function saveEditKriteria($x){
        DB::table('kriteria')->where('idKriteria', '=', $x->idKriteria)->update([
            'namaKriteria' => $x -> namaKriteria,
            'tipe' => $x -> tipe,
            'bobot' => $x -> bobot
        ]);
    }

    public function getKriteria($idKriteria){
        $kriteria = DB::table('kriteria')->where('idKriteria', '=', $idKriteria)->first();
        return $kriteria;
    }

    public function deleteKriteria($idKriteria){
        DB::table('kriteria')->where('idKriteria', '=', $idKriteria)->delete();
    }

}