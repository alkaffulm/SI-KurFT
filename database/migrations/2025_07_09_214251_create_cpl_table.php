<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->unsignedBigInteger('id_ps');
            $table->unsignedBigInteger('id_kurikulum');
            $table->text('desc_cpl_id');
            $table->text('desc_cpl_en');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')->onDelete('cascade');
        });

        DB::statement('ALTER TABLE cpl ADD UNIQUE cpl_desc_unique (`desc`(255))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpl');
    }
};
