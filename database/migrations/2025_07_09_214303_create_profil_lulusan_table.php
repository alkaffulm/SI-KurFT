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
        Schema::create('profil_lulusan', function (Blueprint $table) {
            $table->bigIncrements('id_pl');
            $table->unsignedBigInteger('id_kurikulum');
            $table->unsignedBigInteger('id_ps');
            $table->string('kode_pl');
            $table->string('nama_pl_id');
            $table->string('nama_pl_en');
            $table->text('desc_pl_id');
            $table->text('desc_pl_en');
            $table->text('profesi');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_lulusan');
    }
};