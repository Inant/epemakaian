<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbp', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 100);
            $table->string('nomor');
            $table->boolean('nomor_otomatis');
            $table->date('tanggal');
            $table->unsignedBigInteger('rekening_bank_id');
            $table->foreign('rekening_bank_id')->references('id')->on('rekening_bank');
            $table->unsignedBigInteger('akun_id');
            $table->foreign('akun_id')->references('id')->on('akun');
            $table->unsignedBigInteger('pemakai_id');
            $table->foreign('pemakai_id')->references('id')->on('pemakai')->onDelete('cascade');
            $table->string('keterangan');
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
        Schema::dropIfExists('tbp');
    }
}
