<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemindahanPemakaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemindahan_pemakaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('objek_retribusi_id');
            $table->foreign('objek_retribusi_id')->references('id')->on('objek_retribusi');
            $table->unsignedBigInteger('pemakai_lama');
            $table->foreign('pemakai_lama')->references('id')->on('pemakai');
            $table->unsignedBigInteger('pemakai_baru');
            $table->foreign('pemakai_baru')->references('id')->on('pemakai');
            $table->date('tanggal_sk');
            $table->string('no_sk');
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
        Schema::dropIfExists('pemindahan_pemakaian');
    }
}
