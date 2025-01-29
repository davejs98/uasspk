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
            $table->string('image')->nullable();
            $table->string('nama');
            $table->integer('umur');
            $table->string('jenisKelamin');
            $table->string('riwayatPendidikan');
            $table->string('alamat');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
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
