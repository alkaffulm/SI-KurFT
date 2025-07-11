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
        Schema::create('cpl', function (Blueprint $table) {
            $table->bigIncrements('id_cpl');
            $table->string('nama_kode_cpl');
            $table->integer('id_ps');
            $table->integer('id_kurikulum');
            $table->text('desc');
            $table->integer('bobot_maksimum');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpl');
    }
};
