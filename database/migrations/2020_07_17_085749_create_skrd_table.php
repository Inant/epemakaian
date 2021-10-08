<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkrdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skrd', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->boolean('nomor_otomatis');
            $table->date('tanggal');
            $table->unsignedBigInteger('pemakai_id');
            $table->foreign('pemakai_id')->references('id')->on('pemakai')->onDelete('cascade');
            $table->decimal('nominal', 13, 2);
            $table->string('keterangan');
            $table->date('jatuh_tempo')->nullable()->default(null);
            $table->unsignedBigInteger('object_retribusi_id');
            $table->foreign('object_retribusi_id')->references('id')->on('objek_retribusi');
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
        Schema::dropIfExists('skrd');
    }
}
