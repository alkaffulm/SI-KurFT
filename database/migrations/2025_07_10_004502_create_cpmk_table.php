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
        Schema::create('cpmk', function (Blueprint $table) {
            $table->bigIncrements('id_cpmk');
            $table->unsignedBigInteger('id_ps');
            $table->string('nama_kode_cpmk');
            // $table->integer('kode_cpmk');
            $table->text('desc_cpmk_id');
            $table->text('desc_cpmk_en');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpmk');
    }
};
