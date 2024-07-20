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
        Schema::create('set_ahp', function (Blueprint $table) {
            $table->increments('id_set_ahp');
            $table->string('id_basis');
            $table->string('bobot_prioritas');
            $table->string('consistency_ratio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('set_ahp');
    }
};
