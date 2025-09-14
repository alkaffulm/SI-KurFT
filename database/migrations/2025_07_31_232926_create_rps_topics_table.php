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
            $table->foreignId('id_rps')->constrained('rps', 'id_rps')->onDelete('cascade'); // onDelete('cascade') berarti jika RPS induk dihapus, detail ini akan ikut terhapus.
            $table->string('tipe')->default('topik');
            $table->foreignId('id_sub_cpmk')->nullable()->constrained('sub_cpmk', 'id_sub_cpmk');
            $table->string('teknik_penilaian_kategori')->nullable();
            $table->text('indikator')->nullable();
            // $table->text('metode_pembelajaran')->nullable();
            // $table->text('penugasan_mahasiswa')->nullable();
            // $table->foreignId('id_bentuk_pembelajaran')->nullable()->constrained('bentuk_pembelajaran', 'id_bentuk_pembelajaran')->onDelete('set null');
            $table->text('materi_pembelajaran')->nullable();
            $table->string('refrensi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps_topics');
    }
};
