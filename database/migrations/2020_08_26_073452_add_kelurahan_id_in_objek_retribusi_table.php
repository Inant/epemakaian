<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelurahanIdInObjekRetribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('objek_retribusi', function (Blueprint $table) {
            $table->unsignedBigInteger('kelurahan_id')->nullable()->after('tarif_retribusi_id');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('objek_retribusi', function (Blueprint $table) {
            $table->dropColumn(['kelurahan_id']);
        });
    }
}
