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
        Schema::create('kurikulum_tahun_akademik_map', function (Blueprint $table) {
            $table->bigIncrements('id_kurikulum_tahun_akademik');
            $table->unsignedBigInteger('id_tahun_akademik');
            $table->unsignedBigInteger('id_kurikulum');

            $table->foreign('id_tahun_akademik')->references('id_tahun_akademik')->on('tahun_akademik')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum__tahun_akademiks');
    }
};
