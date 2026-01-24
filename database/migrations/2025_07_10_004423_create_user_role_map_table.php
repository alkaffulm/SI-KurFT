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
        Schema::create('user_role_map', function (Blueprint $table) {
            $table->bigIncrements('id_user_role');
            $table->unsignedBigInteger('id_role');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_ps')->nullable();

            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role_map');
    }
};
