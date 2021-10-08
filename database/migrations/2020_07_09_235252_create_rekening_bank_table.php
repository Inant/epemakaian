<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_bank', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank');
            $table->string('no_rekening');
            $table->unsignedBigInteger('akun_bendahara_id');
            $table->foreign('akun_bendahara_id')->references('id')->on('akun');
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
        Schema::dropIfExists('rekening_bank');
    }
}
