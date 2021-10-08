<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanian', function (Blueprint $table) {
            $table->id();
            $table->string('no_perjanjian_sewa');
            $table->string('nama_penyewa');
            $table->string('lokasi');
            $table->string('jenis_tanaman')->nullable();
            $table->double('luas', 8, 2);
            $table->unsignedInteger('nominal');
            $table->date('tanggal_sewa');
            $table->string('status');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('pertanian');
    }
}
