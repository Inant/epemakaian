<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{
    public function example()
    {
        $pdf = PDF::loadview('layouts.report.example');
        return $pdf->stream('example_report.pdf', ['Attachment' => false]);
    }

    /**
     * Cetak SKRD (Cetakan Per 1 Form SKRD)
     *
     * @return void
     */
    public function cetak_skrd(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.cetak_skrd')
            ->stream('cetak_skrd.pdf', ['Attachment' => false]);
    }

    /**
     * Cetak TBP (Cetakan Per 1 Form TBBP)
     *
     * @return void
     */
    public function cetak_tbp(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.cetak_tbp')
            ->stream('cetak_tbp.pdf', ['Attachment' => false]);
    }

    /**
     * Data Wajib Retribusi Per-Kecamatan
     *
     * @return void
     */
    public function wr_per_kecamatan(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.wr_per_kecamatan')
            ->setPaper('a4', 'landscape')
            ->stream('wr_perkecamatan.pdf', ['Attachment' => false]);
    }

    /**
     * Data Wajib Retribusi Jenis Insidentil (Reklame)
     *
     * @return void
     */
    public function wr_insidentil(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.wr_insidentil')
            ->setPaper('a4', 'landscape')
            ->stream('wr_insidentil.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Pembayaran Retribusi Per Kecamatan
     *
     * @return void
     */
    public function pembayaran_retribusi_kecamatan(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.pembayaran_retribusi_kecamatan')
            ->stream('pembayaran_retribusi_kecamatan.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Piutang Pertahun
     *
     * @return void
     */
    public function piutang_pertahun(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.piutang_pertahun')
            ->setPaper('a4', 'landscape')
            ->stream('piutang_pertahun.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Realisasi Pembayaran Piutang Per Jenis
     *
     * @return void
     */
    public function realisasi_pembayaran(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.realisasi_pembayaran')
            ->stream('realisasi_pembayaran.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Piutang Per Objek Kelurahan
     * 
     * @return void
     */
    public function piutang_perkelurahan(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.piutang_perkelurahan')
            ->setPaper('a4', 'landscape')
            ->stream('piutang_perkelurahan.pdf', ['Attachment' => false]);
    }
    
    /**
     * Laporan Piutang Ijin Pemanfaatan Per Objek Retribusi Per Kelurahan
     * 
     * @return void 
     */
    public function piutang_perobjek_perkelurahan(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.piutang_perobjek_perkelurahan')
            ->setPaper('a4', 'landscape')
            ->stream('piutang_perobjek_perkelurahan.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Piutang Ijin Pemanfaatan Per WR Per Kelurahan
     * 
     * @return void
     */
    public function piutang_perwr_perkelurahan(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.piutang_perwr_perkelurahan')
            ->setPaper('a4', 'landscape')
            ->stream('piutang_perwr_perkelurahan.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Pembayaran Bulanan Per Kelurahan
     * 
     * @return void
     */
    public function pembayaran_bulanan_perkelurahan(PDF $pdf)
    {
        //
    }

    /**
     * Laporan Harian Objek Retribusi 
     * 
     * @return void
     */
    public function laporan_objek_retribusi(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.harian_objek_retribusi')
            ->setPaper('a4', 'landscape')
            ->stream('harian_objek_retribusi.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Harian Nominal Berdasarkan Jenis Pembayaran 
     * 
     * @return void
     */
    public function laporan_nominal_jenis_pembayaran(PDF $pdf)
    {
        return $pdf::loadview('layouts.report.harian_nominal_jenis_pembayaran')
            ->stream('harian_nominal_jenis_pembayaran.pdf', ['Attachment' => false]);
    }
}
