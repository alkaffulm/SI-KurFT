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
            $table->unsignedBigInteger('id_mk');
            $table->string('nama_kode_cpmk');
            $table->integer('kode_cpmk');
            $table->text('desc');

            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
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
