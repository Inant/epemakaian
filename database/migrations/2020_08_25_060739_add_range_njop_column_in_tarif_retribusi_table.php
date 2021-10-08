<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRangeNjopColumnInTarifRetribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarif_retribusi', function (Blueprint $table) {
            $table->string('range_njop')->after('klasifikasi_pemakaian_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarif_retribusi', function (Blueprint $table) {
            $table->dropColumn(['range_njop']);
        });
    }
}
