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
        Schema::create('bentuk_pembelajaran', function (Blueprint $table) {
            $table->id('id_bentuk_pembelajaran');
            $table->string('nama_bentuk_pembelajaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bentuk_pembelajaran');
    }
};
