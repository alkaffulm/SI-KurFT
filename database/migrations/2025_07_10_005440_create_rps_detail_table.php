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
        Schema::create('rps_detail', function (Blueprint $table) {
            $table->bigIncrements('id_rps_detail');
            $table->unsignedBigInteger('id_rps');
            // $table->unsignedBigInteger('id_sub_cpmk')->nullable();
            $table->unsignedBigInteger('id_sub_cpmk');
            $table->integer('minggu');
            $table->decimal('penilaian');
            $table->decimal('bobot');

            $table->foreign('id_rps')->references('id_rps')->on('rps')->onDelete('cascade');
            $table->foreign('id_sub_cpmk')->references('id_sub_cpmk')->on('sub_cpmk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps_detail');
    }
};
