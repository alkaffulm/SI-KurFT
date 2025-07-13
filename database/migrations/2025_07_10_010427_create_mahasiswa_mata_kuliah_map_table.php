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
        Schema::create('mahasiswa_mata_kuliah_map', function (Blueprint $table) {
            $table->bigIncrements('id_mhs_mk');
            $table->unsignedBigInteger('id_mhs');
            $table->unsignedBigInteger('id_mk');

            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswa');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_mata_kuliah_map');
    }
};
