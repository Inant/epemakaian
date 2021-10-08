<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyGolonganColumnInTarifRetribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarif_retribusi', function (Blueprint $table) {
            $table->string('kelas')->nullable()->change();
            $table->string('golongan')->nullable()->change();
            $table->string('kode_tarif')->nullable()->change();
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
            //
        });
    }
}
