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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->bigIncrements('id_kurikulum');
            $table->unsignedBigInteger('id_ps');
            $table->integer('tahun');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};
