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
        Schema::create('ketercapaian_cpl', function (Blueprint $table) {

            $table->id('id_ketercapaian_cpl');

            // relasi mahasiswa
            $table->string('nim');

            // relasi CPL
            $table->unsignedBigInteger('id_cpl');

            // relasi tahun akademik
            $table->unsignedBigInteger('id_tahun_akademik');

            // relasi kurikulum
            $table->unsignedBigInteger('id_kurikulum');

            // hasil ketercapaian
            $table->float('nilai_cpl')->default(0);

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | FOREIGN KEY
            |--------------------------------------------------------------------------
            */

            $table->foreign('nim')
                ->references('nim')
                ->on('mahasiswa')
                ->onDelete('cascade');

            $table->foreign('id_cpl')
                ->references('id_cpl')
                ->on('cpl')
                ->onDelete('cascade');

            $table->foreign('id_tahun_akademik')
                ->references('id_tahun_akademik')
                ->on('tahun_akademik')
                ->onDelete('cascade');

            $table->foreign('id_kurikulum')
                ->references('id_kurikulum')
                ->on('kurikulum')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketercapaian_cpl');
    }
};
