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
        Schema::create('evaluasi_upm', function (Blueprint $table) {
            $table->id('id_evaluasi_upm');
            $table->foreignId('id_ps')->constrained('program_studi', 'id_ps')->onDelete('cascade');
            $table->foreignId('id_tahun_akademik')->constrained('tahun_akademik', 'id_tahun_akademik')->onDelete('cascade');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_upm');
    }
};
