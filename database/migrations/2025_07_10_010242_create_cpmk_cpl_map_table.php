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
        Schema::create('cpmk_cpl_map', function (Blueprint $table) {
            $table->bigIncrements('id_cpmk_cpl');
            $table->unsignedBigInteger('id_cpmk');
            $table->unsignedBigInteger('id_cpl');

            $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk')->onDelete('cascade');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpmk_cpl_map');
    }
};
