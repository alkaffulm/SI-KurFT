<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rps_topic_kriteria_penilaian', function (Blueprint $table) {
            // Foreign key untuk RPSTopicModel dan KriteriaPenilaian
            $table->foreignId('id_topic')->constrained('rps_topics', 'id_topic')->onDelete('cascade');
            $table->foreignId('id_kriteria_penilaian')->constrained('kriteria_penilaian', 'id_kriteria_penilaian')->onDelete('cascade');

            // Set primary key gabungan untuk mencegah duplikasi
            // (satu topic tidak bisa memiliki kriteria yang sama lebih dari sekali)
            $table->primary(['id_topic', 'id_kriteria_penilaian']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kriteria_penilaian_rps_topic');
    }
};
