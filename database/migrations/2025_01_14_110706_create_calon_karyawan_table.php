<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CalonKaryawan', function (Blueprint $table) {
            $table->increments('idCalonKaryawan')->primary;
            $table->string('nama');
            $table->date('tanggalLahir');
            $table->string('jenisKelamin');
            $table->string('riwayatPendidikan');
            $table->integer('ratingPenampilan');
            $table->integer('jumlahSertifikat');
            $table->integer('skorPraktik');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calonkaryawan');
    }
};
