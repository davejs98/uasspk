<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->string('idKriteria', 10)->primary(); // Primary key
            $table->string('namaKriteria'); // Nama kriteria
            $table->enum('tipe', ['Benefit', 'Cost']); // Tipe (Benefit/Cost)
            $table->double('bobot'); // Bobot (e.g., "15%")
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
