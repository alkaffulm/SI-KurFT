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
        Schema::create('user_personalisasi', function (Blueprint $table) {
            $table->bigIncrements('id_personlisasi');
            $table->integer('id_user');
            $table->integer('id_user_role');
            $table->string('email');
            $table->string('userpicture_path');

            $table->foreign('id_user')->references('id_user')->on('user');
            $table->foreign('id_user_role')->references('id_user_role')->on('user_role_map');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_personalisasi');
    }
};
