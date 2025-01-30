<?php

namespace App\Http\Controllers;

use App\Models\CalonKaryawan;
use App\Models\HasilKonversi;
use App\Models\ranking;
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
    public function index()
    {
        // Ambil semua data calon karyawan
        $calonKaryawan = ranking::all();

        // Bobot kriteria (sesuaikan dengan kebutuhan)
        $weights = [
            'riwayatPendidikan' => 0.15,
            'ratingPenampilan' => 0.2,
            'jumlahSertifikat' => 0.25,
            'skorPraktik' => 0.3,
        ];

        // Lakukan perankingan
        $rankedCalonKaryawan = ranking::rankCalonKaryawanWithWeights($calonKaryawan, $weights);

        // Kirim data ke view
        return view('Hasilakhir.hasilakhir', compact('rankedCalonKaryawan'));
    }
}
