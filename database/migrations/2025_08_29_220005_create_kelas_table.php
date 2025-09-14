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
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id_kelas');
            $table->unsignedBigInteger('id_tahun_akademik');
            $table->unsignedBigInteger('id_kurikulum');
            $table->unsignedBigInteger('id_mk');
            $table->unsignedBigInteger('id_user');

            $table->integer('paralel_ke');
            // $table->string('hari');
            // $table->text('jam');
            // $table->string('ruangan');
            $table->string('jumlah_mhs');
            $table->text('excel_daftar_mahasiswa')->nullable();


            $table->foreign('id_tahun_akademik')->references('id_tahun_akademik')->on('tahun_akademik')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
