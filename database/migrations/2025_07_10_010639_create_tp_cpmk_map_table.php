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
        Schema::create('tp_cpmk_map', function (Blueprint $table) {
            $table->bigIncrements('id_tp_cpmk');
            $table->unsignedBigInteger('id_ra');
            $table->unsignedBigInteger('id_tp');
            $table->unsignedBigInteger('id_cpl');
            $table->unsignedBigInteger('id_cpmk')->nullable();
            // $table->unsignedBigInteger('id_cpmk');
            $table->unsignedBigInteger('id_mk');

            $table->foreign('id_ra')->references('id_ra')->on('rubrik_analitik');
            $table->foreign('id_tp')->references('id_tp')->on('teknik_penilaian');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl');
            $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk')->onDelete('SET NULL');
            // $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tp_cpmk_map');
    }
};
