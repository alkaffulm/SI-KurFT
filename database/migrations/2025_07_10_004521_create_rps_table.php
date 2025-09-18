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
            // $table->unsignedBigInteger('id_dosen_penyusun');
            $table->unsignedBigInteger('id_kaprodi')->nullable();
            $table->unsignedBigInteger('id_mk');
            $table->unsignedBigInteger('id_kurikulum');
            $table->unsignedBigInteger('id_ps');
            // $table->unsignedBigInteger('id_bk');
            $table->unsignedBigInteger('id_model_pembelajaran')->nullable();
            $table->text('materi_pembelajaran')->nullable();
            $table->text('pustaka_utama')->nullable();
            $table->text('pustaka_pendukung')->nullable();
            $table->timestamp('tanggal_disusun');
            $table->timestamp('tanggal_revisi')->nullable();
            $table->integer('jumlah_revisi')->default(0);
            $table->boolean('isRevisi')->default(false);
            // $table->foreignId('id_mk_syarat')->nullable()->constrained('mata_kuliah', 'id_mk');
            // $table->string('file_path');
            // $table->integer('minggu');
            // $table->decimal('penilaian');
            // $table->decimal('bobot');

            $table->foreign('id_kaprodi')->references('id_user')->on('user')->onDelete('set null');
            // $table->foreign('id_dosen_penyusun')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_model_pembelajaran')->references('id_model_pembelajaran')->on('model_pembelajaran')->onDelete('set null');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
            // $table->foreign('id_bk')->references('id_bk')->on('bahan_kajian')->onDelete('cascade');

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
