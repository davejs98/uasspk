<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CalonKaryawan extends Model
{
    public function bacaCalonKaryawan(){
        $calonkaryawan = DB::table("calonkaryawan")->get();
        return $calonkaryawan;
    }

    public function saveCalonKaryawan($x){
        DB::table('calonkaryawan')->insert([
            'idCalonKaryawan' => $x -> idCalonKaryawan,
            'nama' => $x -> nama,
            'umur' => $x -> umur,
            'jeniskelamin' => $x -> jenisKelamin,
            'riwayatPendidikan' => $x -> riwayatPendidikan,
            'foto' => $x -> foto
        ]);
    }

    public function saveEditCalonKaryawan($x){
        DB::table('calonkaryawan')->where('idCalonKaryawan', '=', $x->idCalonKaryawan)->update([
            'nama' => $x -> nama,
            'umur' => $x -> umur,
            'jeniskelamin' => $x -> jenisKelamin,
            'riwayatPendidikan' => $x -> riwayatPendidikan
        ]);
    }

    public function getCalonKaryawan($idCalonKaryawan){
        $calonkaryawan = DB::table('calonkaryawan')->where('idCalonKaryawan', '=', $idCalonKaryawan)->first();
        return $calonkaryawan;
    }

    public function deleteCalonKaryawan($idCalonKaryawan){
        DB::table('calonkaryawan')->where('idCalonKaryawan', '=', $idCalonKaryawan)->delete();
    }
    
}
