<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ranking extends Model
{
    use HasFactory;

    protected $table = 'calonkaryawan';

    protected $fillable = [
        'nama',
        'riwayatPendidikan',
        'ratingPenampilan',
        'jumlahSertifikat',
        'skorPraktik',
        'jarakRumah'
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
            return 0; // Default value jika tidak ada yang cocok
        }
    }

    public static function normalizeData($calonKaryawan)
    {
        // Ambil semua data untuk menghitung nilai global min dan max
        $allCalonKaryawan = HasilKonversi::all();

        // Hitung min dan max dari semua data (global)
        $ratingPenampilanMax = $allCalonKaryawan->pluck('ratingPenampilan')->max();
        $jumlahSertifikatMax = $allCalonKaryawan->pluck('jumlahSertifikat')->max();
        $skorPraktikMax = $allCalonKaryawan->pluck('skorPraktik')->max();
        $jarakRumahMin = $allCalonKaryawan->pluck('jarakRumah')->min();

        // Normalisasi data berdasarkan nilai global
        return $calonKaryawan->map(function ($calon) use ($ratingPenampilanMax, $jumlahSertifikatMax, $skorPraktikMax, $jarakRumahMin) {
            return [
                'nama' => $calon->nama,
                'normalized' => [
                    'RiwayatPendidikan' => $calon->riwayatPendidikanKonversi / 5, // Benefit (max value is 5)
                    'RatingPenampilan' => $calon->ratingPenampilan / $ratingPenampilanMax, // Benefit
                    'JumlahSertifikat' => $calon->jumlahSertifikat / $jumlahSertifikatMax, // Benefit
                    'SkorPraktik' => $calon->skorPraktik / $skorPraktikMax, 
                    'jarakRumah' =>  $jarakRumahMin / $calon->jarakRumah , // Benefit
                ],
            ];
        });
    }

    public static function rankCalonKaryawanWithWeights($filteredCalonKaryawan, $weights)
    {
        // Ambil semua data untuk nilai min dan max global
        $allCalonKaryawan = HasilKonversi::all();

        // Hitung min dan max dari semua data (global)
        $ratingPenampilanMax = $allCalonKaryawan->pluck('ratingPenampilan')->max();
        $jumlahSertifikatMax = $allCalonKaryawan->pluck('jumlahSertifikat')->max();
        $skorPraktikMax = $allCalonKaryawan->pluck('skorPraktik')->max();
        $jarakRumahMin = $allCalonKaryawan->pluck('jarakRumah')->min();
        // Bobot kriteria (C1, C2, C3, C4)
        $weights = [
            'RiwayatPendidikan' => $weights['riwayatPendidikan'] ?? 0.25,
            'RatingPenampilan' => $weights['ratingPenampilan'] ?? 0.25,
            'JumlahSertifikat' => $weights['jumlahSertifikat'] ?? 0.25,
            'SkorPraktik' => $weights['skorPraktik'] ?? 0.25,
            'jarakRumah' => $weights['jarakRumah'] ?? 0.25,
        ];

        // Hitung skor total untuk setiap calon karyawan
        return $filteredCalonKaryawan->map(function ($calon) use ($ratingPenampilanMax, $jumlahSertifikatMax, $skorPraktikMax, $jarakRumahMin, $weights) {
            $normalized = [
                'RiwayatPendidikan' => $calon->riwayatPendidikanKonversi / 5, // Benefit (max value is 5)
                'RatingPenampilan' => $calon->ratingPenampilan / $ratingPenampilanMax, // Benefit
                'JumlahSertifikat' => $calon->jumlahSertifikat / $jumlahSertifikatMax, // Benefit
                'SkorPraktik' => $calon->skorPraktik / $skorPraktikMax,
                'jarakRumah' =>  $jarakRumahMin / $calon->jarakRumah, // Benefit
                 // Benefit
            ];

            // Hitung skor total menggunakan bobot
            $score = (
                $weights['RiwayatPendidikan'] * $normalized['RiwayatPendidikan'] +
                $weights['RatingPenampilan'] * $normalized['RatingPenampilan'] +
                $weights['JumlahSertifikat'] * $normalized['JumlahSertifikat'] +
                $weights['SkorPraktik'] * $normalized['SkorPraktik'] + 
                $weights['jarakRumah'] * $normalized['jarakRumah'] 
            );

            return [
                'nama' => $calon->nama,
                'total_score' => round($score, 4),
            ];
        })->sortByDesc('total_score')->values(); // Urutkan berdasarkan skor (descending)
    }
}