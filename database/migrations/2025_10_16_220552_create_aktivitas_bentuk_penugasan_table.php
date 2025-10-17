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
        Schema::create('aktivitas_bentuk_penugasan', function (Blueprint $table) {
            $table->foreignId('id_aktivitas_pembelajaran')->constrained('aktivitas_pembelajaran', 'id_aktivitas_pembelajaran')->onDelete('cascade');
            $table->foreignId('id_bentuk_penugasan')->constrained('bentuk_penugasan', 'id_bentuk_penugasan')->onDelete('cascade');

            $table->primary(['id_aktivitas_pembelajaran', 'id_bentuk_penugasan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_bentuk_penugasan');
    }
};
