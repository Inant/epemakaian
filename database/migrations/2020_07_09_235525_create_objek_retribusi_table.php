<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjekRetribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objek_retribusi', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->unsignedBigInteger('pemakai_id');
            $table->foreign('pemakai_id')->references('id')->on('pemakai')->onDelete('cascade');
            $table->string('lokasi');
            $table->double('luas', 8, 2);
            $table->unsignedBigInteger('tarif_retribusi_id');
            $table->foreign('tarif_retribusi_id')->references('id')->on('tarif_retribusi');
            $table->decimal('tarif', 13, 2);
            $table->date('jatuh_tempo')->nullable()->default(null);
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
        Schema::dropIfExists('objek_retribusi');
    }
}
