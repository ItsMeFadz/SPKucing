<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSetAhpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('set_ahp', function (Blueprint $table) {
            $table->string('jumlah_ratio')->after('id_basis');
            $table->string('n_kriteria')->after('jumlah_ratio');
            $table->string('lamda_max')->after('n_kriteria');
            $table->string('consistency_index')->after('lamda_max');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('set_ahp', function (Blueprint $table) {
            $table->dropColumn(['jumlah_ratio', 'n_kriteria', 'lamda_max', 'consistency_index']);
        });
    }
}
