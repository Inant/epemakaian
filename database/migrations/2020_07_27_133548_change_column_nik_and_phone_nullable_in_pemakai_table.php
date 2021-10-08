<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNikAndPhoneNullableInPemakaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemakai', function (Blueprint $table) {
            $table->string('nik')->nullable()->change();
            $table->string('no_telp')->nullable()->change();
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
            $table->string('nik')->change();
            $table->string('no_telp')->change();
        });
    }
}
