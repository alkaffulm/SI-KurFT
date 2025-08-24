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
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->unsignedBigInteger('id_ps')->nullable();
            $table->string('NIP');
            $table->string('username');
            $table->string('password');
            $table->unsignedBigInteger('last_active_kurikulum_id')->nullable();

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('set null');
            $table->foreign('last_active_kurikulum_id')->references('id_kurikulum')->on('kurikulum')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
