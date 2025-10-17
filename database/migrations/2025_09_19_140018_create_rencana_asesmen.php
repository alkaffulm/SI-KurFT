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
        Schema::create('rencana_asesmen', function (Blueprint $table) {
            $table->id('id_rencana_asesmen');
            // $table->foreignId('id_rps')->constrained('rps', 'id_rps')->onDelete('cascade');
            $table->foreignId('id_ps')->constrained('program_studi', 'id_ps')->onDelete('cascade');
            $table->foreignId('id_kurikulum')->constrained('kurikulum', 'id_kurikulum')->onDelete('cascade');
            $table->foreignId('id_mk')->constrained('mata_kuliah', 'id_mk')->onDelete('cascade');
            $table->enum('tipe_komponen', ['tugas', 'kuis', 'uts', 'uas', 'Hasil Proyek', 'Kegiatan Partisipatif']);
            $table->Integer('nomor_komponen')->nullable();
            // $table->string('deskripsi_tambahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_asesmen');
    }
};
