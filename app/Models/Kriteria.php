<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

Class Kriteria{

    public function bacaKriteria(){
        $kriteria = DB::table("kriteria")->get();
        return $kriteria;
    }

}