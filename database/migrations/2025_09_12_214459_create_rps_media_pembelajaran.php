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
        Schema::create('rps_media_pembelajaran', function (Blueprint $table) {
            $table->foreignId('id_rps')->constrained('rps', 'id_rps')->onDelete('cascade');
            $table->foreignId('id_media_pembelajaran')->constrained('media_pembelajaran', 'id_media_pembelajaran')->onDelete('cascade');
            $table->primary(['id_rps', 'id_media_pembelajaran']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps_media_pembelajaran');
    }
};
