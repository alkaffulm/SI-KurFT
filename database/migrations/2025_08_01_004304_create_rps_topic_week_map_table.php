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
        Schema::create('rps_topic_week', function (Blueprint $table) {
            $table->id('id_week_topic');
            $table->foreignId('id_topic')->constrained('rps_topics', 'id_topic')->onDelete('cascade');
            $table->integer('minggu_ke');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_week_map');
    }
};
