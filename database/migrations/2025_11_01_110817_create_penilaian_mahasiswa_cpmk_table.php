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
        Schema::create('penilaian_mahasiswa_cpmk', function (Blueprint $table) {
            $table->id('id_penilaian_cpmk');
            $table->unsignedBigInteger('id_kelas');
            // $table->unsignedBigInteger('id_mhs');
            $table->string('nim');
            $table->unsignedBigInteger('id_cpmk');
            $table->float('nilai_rata')->nullable();
            $table->timestamps();

            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade');
            // $table->foreign('id_mhs')->references('id_mhs')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_mahasiswa_cpmk');
    }
};
