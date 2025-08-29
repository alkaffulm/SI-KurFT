<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rps_topic_teknik_penilaian', function (Blueprint $table) {
            // Foreign key untuk RPSTopicModel dan TeknikPenilaian
            $table->foreignId('id_topic')->constrained('rps_topics', 'id_topic')->onDelete('cascade');
            $table->foreignId('id_teknik_penilaian')->constrained('teknik_penilaian', 'id_teknik_penilaian')->onDelete('cascade');
            // $table->string('kategori');
            // Set primary key gabungan untuk mencegah duplikasi
            $table->primary(['id_topic', 'id_teknik_penilaian']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rps_topic_teknik_penilaian');
    }
};
