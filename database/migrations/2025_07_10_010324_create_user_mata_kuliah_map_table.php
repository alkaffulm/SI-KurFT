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
        Schema::create('user_mata_kuliah_map', function (Blueprint $table) {
            $table->bigIncrements('id_user_mk');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_mk');

            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_mata_kuliah_map');
    }
};
