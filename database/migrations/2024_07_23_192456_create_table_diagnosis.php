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
        Schema::create('diagnosis_detail', function (Blueprint $table) {
            $table->increments('id_diagnosis_detail');
            $table->string('id_diagnosis');
            $table->string('id_penyakit');
            $table->string('id_gejala');
            $table->string('nilai_cf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosis_detail');
    }
};
