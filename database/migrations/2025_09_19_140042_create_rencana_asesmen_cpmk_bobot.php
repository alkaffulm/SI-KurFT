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
        Schema::create('rencana_asesmen_cpmk_bobot', function (Blueprint $table) {
            $table->id('id_asesmen_cpmk_bobot');
            $table->foreignId('id_rencana_asesmen')->constrained('rencana_asesmen', 'id_rencana_asesmen')->onDelete('cascade');
            $table->foreignId('id_cpmk')->constrained('cpmk', 'id_cpmk')->onDelete('cascade');
            $table->decimal('bobot')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_asesmen_cpmk_bobot');
    }
};
