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
        Schema::create('mahasiswa_cpl_map', function (Blueprint $table) {
            $table->bigIncrements('id_mhs_cpl');
            $table->unsignedBigInteger('id_mhs');
            $table->unsignedBigInteger('id_cpl');

            $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswa');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_cpl_map');
    }
};
