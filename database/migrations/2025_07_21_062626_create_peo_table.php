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
        Schema::create('peo', function (Blueprint $table) {
            $table->bigIncrements('id_peo');
            $table->unsignedBigInteger('id_ps');
            $table->unsignedBigInteger('id_kurikulum');
            $table->string('kode_peo');
            $table->text('desc_peo');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peo');
    }
};
