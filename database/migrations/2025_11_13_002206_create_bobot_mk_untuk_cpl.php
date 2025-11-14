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
        Schema::create('bobot_mk_untuk_cpl', function (Blueprint $table) {
            $table->id('id_bobot_mk_cpl');
            $table->unsignedBigInteger('id_mk');
            $table->unsignedBigInteger('id_cpl');
            $table->integer('bobot_persen');

            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bobot_mk_untuk_cpl');
    }
};
