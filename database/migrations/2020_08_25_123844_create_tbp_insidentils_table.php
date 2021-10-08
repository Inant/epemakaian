<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbpInsidentilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbp_insidentils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_pembayaran_id');
            $table->unsignedBigInteger('rekening_bank_id');
            $table->unsignedBigInteger('akun_id');
            $table->string('no_surat_izin');
            $table->date('tanggal_izin');
            $table->string('pemakai');
            $table->string('nama_objek');
            $table->string('alamat_objek');
            $table->decimal('tarif', 13, 2);
            $table->unsignedInteger('tinggi');
            $table->unsignedInteger('luas');
            $table->timestamps();

            $table->foreign('rekening_bank_id')->references('id')->on('rekening_bank');
            $table->foreign('jenis_pembayaran_id')->references('id')->on('jenis_pembayaran');
            $table->foreign('akun_id')->references('id')->on('akun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbp_insidentils');
    }
}
