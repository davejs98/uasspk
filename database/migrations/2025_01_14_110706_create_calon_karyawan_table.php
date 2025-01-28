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
            $table->id('idCalonKaryawan')->primary();
            $table->string('nama');
            $table->integer('umur');
            $table->string('jenisKelamin');
            $table->string('riwayatPendidikan');
            $table->string('foto')->nullable(); // Kolom untuk menyimpan gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_karyawan');
    }
};
