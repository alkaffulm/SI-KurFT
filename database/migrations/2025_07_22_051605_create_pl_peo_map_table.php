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
        Schema::create('pl_peo_map', function (Blueprint $table) {
            $table->bigIncrements('id_pl_peo');
            $table->unsignedBigInteger('id_pl');
            $table->unsignedBigInteger('id_peo');

            $table->foreign('id_pl')->references('id_pl')->on('profil_lulusan');
            $table->foreign('id_peo')->references('id_peo')->on('peo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pl_peo_map');
    }
};
