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
        Schema::create('rps', function (Blueprint $table) {
            $table->bigIncrements('id_rps');
            $table->integer('id_user');
            $table->integer('id_mk');
            $table->integer('tahun');
            $table->string('file_path');

            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps');
    }
};
