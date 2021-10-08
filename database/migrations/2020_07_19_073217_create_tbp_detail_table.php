<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbpDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbp_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tbp_id');
            $table->foreign('tbp_id')->references('id')->on('tbp');
            $table->unsignedBigInteger('skrd_id')->nullable();
            $table->foreign('skrd_id')->references('id')->on('skrd');
            $table->unsignedBigInteger('objek_retribusi_id')->nullable();
            $table->foreign('objek_retribusi_id')->references('id')->on('objek_retribusi');
            $table->unsignedBigInteger('jenis_pembayaran_id');
            $table->decimal('nominal', 13, 2);
            $table->foreign('jenis_pembayaran_id')->references('id')->on('jenis_pembayaran');
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
        Schema::dropIfExists('tbp_detail');
    }
}
