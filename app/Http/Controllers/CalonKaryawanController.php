<?php

namespace App\Http\Controllers;

use App\Models\CalonKaryawan;
use Illuminate\Http\Request;

class CalonKaryawanController extends Controller
{
    public function calonkaryawan(){
        $x = new CalonKaryawan();
        $hasil = $x->bacaCalonKaryawan();
        return view('calonkaryawan.calonkaryawan', ["hasil" => $hasil]);
    }

    public function addCalonKaryawan(){
        return view('calonkaryawan.addCalonKaryawan');
    }
    public function detailkonversiCalonKaryawan($idCalonKaryawan){
        $x = new CalonKaryawan();
        $hasil = $x->getCalonKaryawan($idCalonKaryawan);
        return view('calonkaryawan.editCalonKaryawan', ["getCalonKaryawan" => $hasil]);
    }

    public function saveCalonKaryawan(Request $request){
        $x = new CalonKaryawan();
        $x -> saveCalonKaryawan($request);
        return redirect() -> route('calonkaryawan');
    }

    public function editCalonKaryawan($idCalonKaryawan){
        $x = new CalonKaryawan();
        $hasil = $x->getCalonKaryawan($idCalonKaryawan);
        return view('calonkaryawan.editCalonKaryawan', ["getCalonKaryawan" => $hasil]);
    }

    public function saveEditedCalonKaryawan(Request $request){
        $x = new CalonKaryawan();
        $x->saveEditCalonKaryawan($request);
        return redirect() -> route('calonkaryawan');
    }

    public function deleteCalonKaryawan($idCalonKaryawan){
        $x = new CalonKaryawan();
        $x->deleteCalonKaryawan($idCalonKaryawan);
        return redirect() -> route('calonkaryawan');
    }
}
