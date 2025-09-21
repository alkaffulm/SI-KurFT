<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teknik_penilaian', function (Blueprint $table) {
            $table->id('id_teknik_penilaian');
            $table->unsignedBigInteger('id_ps');
            $table->string('nama_teknik_penilaian');
            $table->string('kategori');
            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teknik_penilaian');
    }
};
