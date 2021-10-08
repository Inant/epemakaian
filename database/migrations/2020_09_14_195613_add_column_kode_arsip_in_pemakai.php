<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKodeArsipInPemakai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemakai', function (Blueprint $table) {
            $table->string('kode_arsip', 9)->nullable();
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
            $table->dropColumn(['kode_arsip']);
        });
    }
}
