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
        Schema::table('set_ahp', function (Blueprint $table) {
            $table->dropColumn('bobot_prioritas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('set_ahp', function (Blueprint $table) {
            $table->string('bobot_prioritas'); // Sesuaikan tipe data sesuai dengan yang ada sebelumnya
        });
    }
};
