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
            $table->unsignedBigInteger('id_ps');
            $table->unsignedBigInteger('id_kurikulum');
            $table->string('kode_mk');
            $table->string('nama_matkul_id');
            $table->string('nama_matkul_en');
            $table->text('matkul_desc_id');
            $table->text('matkul_desc_en');
            // $table->integer('jumlah_sks');
            $table->integer('sks_teori');
            $table->integer('sks_praktikum');
            $table->integer('semester');
            $table->string('muncul')->nullable();

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
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
