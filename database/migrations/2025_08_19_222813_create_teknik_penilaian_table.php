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
            $table->string('nama_teknik_penilaian');
            $table->string('kategori');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teknik_penilaian');
    }
};
