<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTarifmeterInTarifRetribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarif_retribusi', function (Blueprint $table) {
            $table->decimal('tarif_meter', 13, 2)->default(0.00);
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
            $table->dropColumn(['tarif_meter']);
        });
    }
}
