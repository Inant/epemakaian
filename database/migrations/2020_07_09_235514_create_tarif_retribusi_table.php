<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifRetribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarif_retribusi', function (Blueprint $table) {
            $table->id();
            $table->string('kelas');
            $table->string('golongan');
            $table->decimal('njop_min', 13, 2);
            $table->decimal('njop_max', 13, 2);
            $table->string('kode_tarif');
            $table->unsignedBigInteger('klasifikasi_pemakaian_id');
            $table->foreign('klasifikasi_pemakaian_id')->references('id')->on('klasifikasi_pemakaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarif_retribusi');
    }
}
