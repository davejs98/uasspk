<?php

namespace App\Http\Controllers;

use App\Models\HasilKonversi;
use Illuminate\Http\Request;

class konversi extends Controller
{
    public function bacakonversi()
    {
        $calonKaryawan = HasilKonversi::all();
        return view('konversi.konversi', compact('calonKaryawan'));
    }
}
