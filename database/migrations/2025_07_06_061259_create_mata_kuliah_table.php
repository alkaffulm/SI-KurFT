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
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->bigIncrements('id_mk');
            $table->integer('id_user');
            $table->integer('id_ps');
            $table->string('nama_matkul');
            $table->integer('jumlah_sks');

            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_ps')->references('id_ps')->on('program_studi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
