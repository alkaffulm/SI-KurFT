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
        Schema::create('bahan_kajian', function (Blueprint $table) {
            $table->bigIncrements('id_bk');
            $table->unsignedBigInteger('id_ps');
            $table->unsignedBigInteger('id_kurikulum');
            $table->string('nama_kode_bk');
            $table->string('nama_bk_id');
            $table->string('nama_bk_en');
            $table->string('kategori');
            $table->text('desc_bk_id');
            $table->text('desc_bk_en');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahan_kajian');
    }
};
