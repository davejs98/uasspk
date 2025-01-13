<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller{
    

    public function kriteria(){
        $x = new Kriteria();
        $hasil = $x->bacaKriteria();
        return view('kriteria.kriteria', ["hasil" => $hasil]);
    }

}
