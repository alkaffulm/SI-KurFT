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
        Schema::create('mk_cpmk_cpl_map', function (Blueprint $table) {
            $table->bigIncrements('id_mk_cpmk_cpl');
            $table->unsignedBigInteger('id_mk');
            $table->unsignedBigInteger('id_cpl');
            $table->unsignedBigInteger('id_cpmk')->nullable();

            $table->foreign('id_mk')->references('id_mk')->on('mata_kuliah')->onDelete('cascade');
            $table->foreign('id_cpl')->references('id_cpl')->on('cpl')->onDelete('cascade');
            $table->foreign('id_cpmk')->references('id_cpmk')->on('cpmk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_k__c_p_m_k__c_p_l__maps');
    }
};
