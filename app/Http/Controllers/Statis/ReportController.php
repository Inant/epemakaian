<?php

namespace App\Http\Controllers\Statis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Master\KecamatanRepository;
use App\Repository\Master\ObjectRetribusiRepository;
use App\Repository\Statis\ReportRepository;
use App\Repository\Statis\TahunRepository;
use App\Repository\Transaction\JenisPembayaranRepository;
use App\Repository\Transaction\SkrdRepository;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller
{

    /**
     * ReportRepository
     *
     * @var Object
     */
    private $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatanRepository = app(KecamatanRepository::class);
        $jenisPembayaranRepository = app(JenisPembayaranRepository::class);
        $tahunRepository = app(TahunRepository::class);

        $kecamatan = $kecamatanRepository->all();
        $jenisPembayaran = $jenisPembayaranRepository->all();
        $tahun = $tahunRepository->all();

        return view('report.index', compact('kecamatan', 'jenisPembayaran', 'tahun'));
    }

    /**
     * Data Wajib Retribusi Per-Kecamatan
     *
     * @return void
     */
    public function wr_kecamatan(
        Request $request,
        PDF $pdf
    )
    {
        $kecamatanRepository = app(KecamatanRepository::class);
        $skrdRepository = app(SkrdRepository::class);

        $kecamatan = $kecamatanRepository->find($request->kecamatan);
        $tahun = $request->tahun;
        $skrds = $skrdRepository->getSkrdKecamatan($request->only('kecamatan', 'tahun', 'status'));
        return $pdf::loadview('layouts.report.wr_per_kecamatan', compact('tahun', 'kecamatan', 'skrds'))
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
     * Laporan Harian Objek Retribusi
     *
     * @return void
     */
    public function harian_objek_retribusi(
        PDF $pdf,
        Request $request
    )
    {
        $objectRetribusi = $this->reportRepository->objekRetribusiPay(
            $request->only(['tanggal_awal', 'tanggal_akhir'])
        );

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        $totalTarif = collect($objectRetribusi)->sum('total_tarif');
        $totalBayar = collect($objectRetribusi)->sum('total_bayar');

        return $pdf::loadview('layouts.report.harian_objek_retribusi', compact('objectRetribusi', 'tanggalAwal', 'tanggalAkhir', 'totalTarif', 'totalBayar'))
            ->setPaper('a4', 'landscape')
            ->stream('harian_objek_retribusi.pdf', ['Attachment' => false]);
    }

    /**
     * Laporan Harian Nominal Berdasarkan Jenis Pembayaran
     *
     * @return void
     */
    public function harian_nominal_jenis_pembayaran(
        PDF $pdf,
        Request $request
    )
    {
        $nominalTbp = $this->reportRepository->totalNominalTbp(
            $request->only(['tanggal_awal', 'tanggal_akhir'])
        );
        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;
        $totalNominalTbp = $nominalTbp['TBP_OA'] + $nominalTbp['TBP_PUTG'] + $nominalTbp['TBP_SA'];
        return $pdf::loadview('layouts.report.harian_nominal_jenis_pembayaran', compact('nominalTbp', 'totalNominalTbp', 'tanggalAwal', 'tanggalAkhir'))
            ->stream('harian_nominal_jenis_pembayaran.pdf', ['Attachment' => false]);
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
}
