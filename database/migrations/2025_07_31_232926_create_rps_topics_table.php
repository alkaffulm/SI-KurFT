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
        Schema::create('rps_topics', function (Blueprint $table) {
            // Kunci utama untuk setiap baris detail
            $table->id('id_topic');

            // Kunci asing yang menghubungkan detail ini ke RPS induknya
            // onDelete('cascade') berarti jika RPS induk dihapus, detail ini akan ikut terhapus.
            $table->foreignId('id_rps')->constrained('rps', 'id_rps')->onDelete('cascade');

            // --- Kolom-kolom sesuai tabel di PDF ---

            // Kolom "Kemampuan akhir (Sub-CPMK)" - kita simpan ID-nya
            $table->foreignId('id_sub_cpmk')->constrained('sub_cpmk', 'id_sub_cpmk');

            // Kolom "Indikator" - tipe text karena bisa panjang
            $table->text('indikator')->nullable();

            // Kolom "Kriteria & Teknik Penilaian"
            $table->text('kriteria_teknik_penilaian')->nullable();
            
            // Kolom "Bentuk Pembelajaran; Metode Pembelajaran; Penugasan Mahasiswa"
            $table->text('metode_pembelajaran')->nullable();

            // Kolom "Materi Pembelajaran"
            $table->text('materi_pembelajaran')->nullable();

            // Kolom "Bobot Penilaian (%)"
            $table->float('bobot_penilaian')->default(0);

            // Timestamps standar Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
