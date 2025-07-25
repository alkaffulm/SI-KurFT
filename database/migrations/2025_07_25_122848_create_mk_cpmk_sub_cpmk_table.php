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
        Schema::create('mk_cpmk_sub_cpmk', function (Blueprint $table) {
            $table->bigIncrements('id_mk_cpmk_sub_cpmk');
            $table->unsignedBigInteger('id_mk');
            $table->unsignedBigInteger('id_cpmk');
            $table->unsignedBigInteger('id_sub_cpmk');

            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk')->onDelete('cascade');
            $table->foreign('id_sub_cpmk')->references('id_sub_cpmk')->on('sub_cpmk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mk_cpmk_sub_cpmk');
    }
};
