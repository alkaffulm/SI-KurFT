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
        Schema::create('cpl_pl_map', function (Blueprint $table) {
            $table->bigIncrements('id_cpl_pl');
            $table->unsignedBigInteger('id_cpl');
            $table->unsignedBigInteger('id_pl');

            $table->foreign('id_pl')->references('id_pl')->on('profil_lulusan')->onDelete('cascade');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpl_pl_map');
    }
};
