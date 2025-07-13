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
        Schema::create('pl_cpl_map', function (Blueprint $table) {
            $table->bigIncrements('id_pl_cpl');
            $table->unsignedBigInteger('id_pl');
            $table->unsignedBigInteger('id_cpl');

            $table->foreign('id_pl')->references('id_pl')->on('profil_lulusan');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_cpl_map');
    }
};
