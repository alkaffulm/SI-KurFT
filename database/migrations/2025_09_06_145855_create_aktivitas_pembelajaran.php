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
        Schema::create('aktivitas_pembelajaran', function (Blueprint $table) {
            $table->id('id_aktivitas_pembelajaran');
            $table->foreignId('id_topic')->constrained('rps_topics', 'id_topic')->onDelete('cascade');
            $table->enum('tipe', ['TM', 'BM', 'BT']);
            // $table->foreignId('id_bentuk_pembelajaran')->constrained('bentuk_pembelajaran', 'id_bentuk_pembelajaran');
            // $table->text('penugasan_mahasiswa')->nullable();
            $table->string('jumlah_pertemuan')->nullable();
            $table->string('jumlah_sks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_pembelajaran');
    }
};
