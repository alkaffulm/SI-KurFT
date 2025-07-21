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
            $table->string('kode_peo');
            $table->string('desc');

            $table->foreign('desc')->references('desc')->on('cpl')->onDelete('cascade');
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
