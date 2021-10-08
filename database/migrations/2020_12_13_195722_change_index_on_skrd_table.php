<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIndexOnSkrdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skrd', function (Blueprint $table) {
            $table->index(['tanggal', 'pemakai_id', 'object_retribusi_id']);
        });

        Schema::table('pemakai', function (Blueprint $table) {
            $table->index(['nama']);
        });

        Schema::table('tbp', function (Blueprint $table) {
            $table->index(['tanggal', 'pemakai_id', 'rekening_bank_id', 'akun_id']);
        });

        Schema::table('tbp_detail', function (Blueprint $table) {
            $table->index(['tbp_id', 'skrd_id', 'jenis_pembayaran_id']);
        });

        Schema::table('objek_retribusi', function (Blueprint $table) {
            $table->index(['pemakai_id', 'tarif_retribusi_id', 'kelurahan_id']);
        });

        Schema::table('tarif_retribusi', function (Blueprint $table) {
            $table->index(['klasifikasi_pemakaian_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skrd', function (Blueprint $table) {
            $table->dropIndex(['tanggal', 'pemakai_id', 'object_retribusi_id']);
        });

        Schema::table('pemakai', function (Blueprint $table) {
            $table->dropIndex(['nama']);
        });

        Schema::table('tbp', function (Blueprint $table) {
            $table->dropIndex(['tanggal', 'pemakai_id', 'rekening_bank_id', 'akun_id']);
        });

        Schema::table('tbp_detail', function (Blueprint $table) {
            $table->dropIndex(['tbp_id', 'skrd_id', 'jenis_pembayaran_id']);
        });

        Schema::table('objek_retribusi', function (Blueprint $table) {
            $table->dropIndex(['pemakai_id', 'tarif_retribusi_id', 'kelurahan_id']);
        });
    }
}
