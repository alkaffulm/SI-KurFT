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
        Schema::create('bk_cpl_map', function (Blueprint $table) {
            $table->bigIncrements('id_bk_cpl');
            $table->integer('id_bk');
            $table->integer('id_cpl');

            $table->foreign('id_bk')->references('id_bk')->on('bahan_kajian');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bk_cpl_map');
    }
};
