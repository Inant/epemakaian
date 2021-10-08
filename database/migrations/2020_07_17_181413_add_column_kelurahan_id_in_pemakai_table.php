<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKelurahanIdInPemakaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemakai', function (Blueprint $table) {
            $table->unsignedBigInteger('kelurahan_id')->nullable()->after('no_urut');
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
        Schema::table('pemakai', function (Blueprint $table) {
            $table->dropColumn(['kelurahan_id']);
        });
    }
}
