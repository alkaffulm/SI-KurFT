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
        Schema::create('mk_cpmk_bobot', function (Blueprint $table) {
            $table->id('id_mk_cpmk_bobot');
            $table->unsignedBigInteger('id_mk_cpmk_cpl');
            $table->integer('bobot');

            $table->foreign('id_mk_cpmk_cpl')->references('id_mk_cpmk_cpl')->on('mk_cpmk_cpl_map')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mk_cpmk_bobot');
    }
};
