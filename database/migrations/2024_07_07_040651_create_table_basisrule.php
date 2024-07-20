<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('basisrule', function (Blueprint $table) {
            $table->increments('id_basis');
            $table->string('id_penyakit');
            $table->string('id_gejala');
            $table->string('bobot_prioritas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basisrule');
    }
};
