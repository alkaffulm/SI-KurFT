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
        Schema::create('sub_cpmk', function (Blueprint $table) {
            $table->bigIncrements('id_sub_cpmk');
            $table->unsignedBigInteger('id_ps');
            $table->unsignedBigInteger('id_cpmk')->nullable();
            $table->unsignedBigInteger('id_kurikulum');
            // $table->unsignedBigInteger('id_cpmk');
            $table->string('nama_kode_sub_cpmk');
            // $table->integer('kode_sub_cpmk')->nullable();
            $table->text('desc_sub_cpmk_id');
            $table->text('desc_sub_cpmk_en');

            $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk')->onDelete('cascade');
            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_cpmk');
    }
};
