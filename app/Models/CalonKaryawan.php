<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CalonKaryawan extends Model
{
    public function bacaCalonKaryawan(){
        $calonkaryawan = DB::table("calonkaryawan")
        ->select('*', DB::raw('YEAR(CURDATE()) - YEAR(tanggalLahir) - (DATE_FORMAT(CURDATE(), "%m-%d") < DATE_FORMAT(tanggalLahir, "%m-%d")) as age'))
        ->get();        
        return $calonkaryawan;
    }

    public function saveCalonKaryawan($x){
        DB::table('calonkaryawan')->insert([
            'idCalonKaryawan' => $x -> idCalonKaryawan,
            'nama' => $x -> nama,
            'tanggalLahir' => $x -> tanggalLahir,
            'jarakRumah' => $x -> jarakRumah,
            'jeniskelamin' => $x -> jenisKelamin,
            'riwayatPendidikan' => $x -> riwayatPendidikan,
            'ratingPenampilan' => $x -> ratingPenampilan,
            'jumlahSertifikat' => $x -> jumlahSertifikat,
            'skorPraktik' => $x -> skorPraktik,
            'alamat' => $x -> alamat
        ]);
    }

    public function saveEditCalonKaryawan($x){
        DB::table('calonkaryawan')->where('idCalonKaryawan', '=', $x->idCalonKaryawan)->update([
            'nama' => $x -> nama,
            'tanggalLahir' => $x -> tanggalLahir,
            'jeniskelamin' => $x -> jenisKelamin,
            'riwayatPendidikan' => $x -> riwayatPendidikan,
            'ratingPenampilan' => $x -> ratingPenampilan,
            'jumlahSertifikat' => $x -> jumlahSertifikat,
            'skorPraktik' => $x -> skorPraktik,
            'alamat' => $x -> alamat,
        ]);
    }

    public function getCalonKaryawan($idCalonKaryawan){
        $calonkaryawan = DB::table('calonkaryawan')->where('idCalonKaryawan', '=', $idCalonKaryawan)
        ->select('*', DB::raw('YEAR(CURDATE()) - YEAR(tanggalLahir) - (DATE_FORMAT(CURDATE(), "%m-%d") < DATE_FORMAT(tanggalLahir, "%m-%d")) as age'))
        ->first();
        return $calonkaryawan;
    }

    public function deleteCalonKaryawan($idCalonKaryawan){
        DB::table('calonkaryawan')->where('idCalonKaryawan', '=', $idCalonKaryawan)->delete();
    }

 
    
}
