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
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->increments('id_diagnosis');
            $table->string('nama_pemilik');
            $table->string('nama_kucing');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_diagnosis');
    }
};
