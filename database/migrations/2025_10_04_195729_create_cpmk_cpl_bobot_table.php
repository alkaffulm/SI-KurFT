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
    Schema::create('cpl_cpmk_bobot', function (Blueprint $table) {
        $table->id('id_cpl_cpmk_bobot');
        $table->foreignId('id_mk')->constrained('mata_kuliah', 'id_mk')->onDelete('cascade');
        $table->foreignId('id_ps')->constrained('program_studi', 'id_ps')->onDelete('cascade');
        $table->foreignId('id_kurikulum')->constrained('kurikulum', 'id_kurikulum')->onDelete('cascade');
        $table->foreignId('id_cpl')->constrained('cpl', 'id_cpl')->onDelete('cascade');
        $table->foreignId('id_cpmk')->constrained('cpmk', 'id_cpmk')->onDelete('cascade');
        $table->decimal('bobot')->default(0); 
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpmk_cpl_bobot');
    }
};
