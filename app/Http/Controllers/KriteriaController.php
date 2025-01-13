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

    public function addKriteria(){
        return view('kriteria.addKriteria');
    }

    public function saveKriteria(Request $request){
        $x = new Kriteria();
        $x -> saveKriteria($request);
        return redirect() -> route('kriteria');
    }

    public function editKriteria($idKriteria){
        $x = new Kriteria();
        $hasil = $x->getKriteria($idKriteria);
        return view('kriteria.editKriteria', ["getKriteria" => $hasil]);
    }

    public function saveEditedKriteria(Request $request){
        $x = new Kriteria();
        $x->saveEditKriteria($request);
        return redirect() -> route('kriteria');
    }

    public function deleteKriteria($idKriteria){
        $x = new Kriteria();
        $x->deleteKriteria($idKriteria);
        return redirect() -> route('kriteria');
    }

}
