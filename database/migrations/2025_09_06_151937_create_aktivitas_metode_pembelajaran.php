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
        Schema::create('aktivitas_metode_pembelajaran', function (Blueprint $table) {
            $table->foreignId('id_aktivitas_pembelajaran')->constrained('aktivitas_pembelajaran', 'id_aktivitas_pembelajaran')->onDelete('cascade');
            $table->foreignId('id_metode_pembelajaran')->constrained('metode_pembelajaran', 'id_metode_pembelajaran')->onDelete('cascade');

            $table->primary(['id_aktivitas_pembelajaran', 'id_metode_pembelajaran']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_metode_pembelajaran');
    }
};
