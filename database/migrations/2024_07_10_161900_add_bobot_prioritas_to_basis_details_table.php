<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBobotPrioritasToBasisDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('basisrule_detail', function (Blueprint $table) {
            $table->decimal('bobot_prioritas', 8, 2)->after('id_gejala')->nullable();
        });
    }

    public function down()
    {
        Schema::table('basisrule_detail', function (Blueprint $table) {
            $table->dropColumn('bobot_prioritas');
        });
    }
}
