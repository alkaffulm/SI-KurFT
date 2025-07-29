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
        Schema::create('rps', function (Blueprint $table) {
            $table->bigIncrements('id_rps');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_mk');
            $table->unsignedBigInteger('id_kurikulum');
            $table->integer('tahun');
            $table->string('file_path');
            $table->integer('minggu');
            $table->decimal('penilaian');
            $table->decimal('bobot');

            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps');
    }
};
