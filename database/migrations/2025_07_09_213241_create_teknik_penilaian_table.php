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
        Schema::create('teknik_penilaian', function (Blueprint $table) {
            $table->bigIncrements('id_tp');
            $table->string('tahap_penilaian');
            $table->string('teknik_penilaian');
            $table->string('instrumen');
            $table->string('kriteria');
            $table->integer('bobot_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknik_penilaian');
    }
};
