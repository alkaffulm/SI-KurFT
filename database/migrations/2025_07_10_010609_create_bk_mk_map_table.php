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
        Schema::create('bk_mk_map', function (Blueprint $table) {
            $table->bigIncrements('id_bk_mk');
            $table->unsignedBigInteger('id_bk');
            $table->unsignedBigInteger('id_mk');

            $table->foreign('id_bk')->references('id_bk')->on('bahan_kajian');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bk_mk_map');
    }
};
