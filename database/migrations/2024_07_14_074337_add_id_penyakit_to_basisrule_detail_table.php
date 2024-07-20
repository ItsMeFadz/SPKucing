<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPenyakitToBasisruleDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('basisrule_detail', function (Blueprint $table) {
            if (Schema::hasColumn('basisrule_detail', 'id_penyakit')) {
                $table->dropForeign(['id_penyakit']);
                $table->dropColumn('id_penyakit');
            }
            $table->unsignedBigInteger('id_penyakit')->after('id_basis');
            $table->foreign('id_penyakit')->references('id')->on('penyakit')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('basisrule_detail', function (Blueprint $table) {
            $table->dropForeign(['id_penyakit']);
            $table->dropColumn('id_penyakit');
        });
    }
}
