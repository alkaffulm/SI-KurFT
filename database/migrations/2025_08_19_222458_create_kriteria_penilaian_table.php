<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kriteria_penilaian', function (Blueprint $table) {
            $table->id('id_kriteria_penilaian');
            $table->string('nama_kriteria_penilaian');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kriteria_penilaian');
    }
};
