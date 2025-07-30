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
        Schema::create('rps_matakuliah_syarat_map', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_rps')->constrained('rps', 'id_rps')->onDelete('cascade');
            $table->foreignId('id_mk_syarat')->constrained('mata_kuliah', 'id_mk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rps_matakuliah_syarat_map');
    }
};
