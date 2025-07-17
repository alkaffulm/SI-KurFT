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
        Schema::create('profil_lulusan', function (Blueprint $table) {
            $table->bigIncrements('id_pl');
            $table->unsignedBigInteger('id_ps');
            $table->string('profil_lulusan');
            $table->text('desc');

            $table->foreign('id_ps')->references('id_ps')->on('program_studi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_lulusan');
    }
};
