<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKonversi extends Model
{
    use HasFactory;

    protected $table = 'calonkaryawan';

    protected $fillable = [
        'nama',
        'riwayatPendidikan',
        'ratingPenampilan',
        'jumlahSertifikat',
        'skorPraktik'
    ];

    // Accessor untuk konversi riwayat_pendidikan
    public function getRiwayatPendidikanKonversiAttribute()
    {
        $riwayatPendidikan = $this->attributes['riwayatPendidikan'];

        if ($riwayatPendidikan == 'sarjana1') {
            return 4;
        } elseif ($riwayatPendidikan == 'sarjana2') {
            return 5;
        } elseif ($riwayatPendidikan == 'sma') {
            return 3;
        } elseif ($riwayatPendidikan == 'smp') {
            return 2;
        } elseif ($riwayatPendidikan == 'sd') {
            return 1;
        } else {
            return 'salah nih';
        }
    }
}
