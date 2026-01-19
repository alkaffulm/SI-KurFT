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
        Schema::create('metode_pembelajaran', function (Blueprint $table) {
            $table->id('id_metode_pembelajaran');
            $table->string('nama_metode_pembelajaran');
            $table->enum('tipe_metode_pembelajaran', ['tm', 'bm']);
            $table->unsignedBigInteger('id_ps');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_pembelajaran');
    }
};
