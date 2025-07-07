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
            $table->integer('id_ps');
            $table->text('desc');
            $table->integer('tahun_kurikulum');


            $table->foreign('id_ps')->references('id_ps')->on('program_studi');
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
