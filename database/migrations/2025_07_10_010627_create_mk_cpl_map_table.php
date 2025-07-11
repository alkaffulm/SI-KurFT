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
        Schema::create('mk_cpl_map', function (Blueprint $table) {
            $table->bigIncrements('id_mk_cpl');
            $table->integer('id_mk');
            $table->integer('id_cpl');

            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mk_cpl_map');
    }
};
