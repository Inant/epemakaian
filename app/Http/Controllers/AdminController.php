<?php

namespace App\Http\Controllers;

use App\Repository\Master\KlasifikasiPemakaianRepository;
use App\Repository\Master\ObjectRetribusiRepository;
use App\Repository\Statis\TahunRepository;
use App\Repository\Transaction\MonitoringPiutangRepository;
use App\Repository\Transaction\TbpRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Index dashboard
     */
    public function index(
        Request $request,
        KlasifikasiPemakaianRepository $klasifikasiRepository,
        ObjectRetribusiRepository $objectRetribusiRepository,
        TbpRepository $tbpRepository,
        TahunRepository $tahunRepository,
        MonitoringPiutangRepository $monitoringPiutangRepository
    )
    {
        $yearActive = $request->year ? $request->year : date('Y');
        $tahun = $tahunRepository->all();
        $attributes = ['year' => $yearActive];
        $totalKlasifikasi = $klasifikasiRepository->countObject();
        $piutang = $monitoringPiutangRepository->getPiutang($attributes);
        $nominalPiutang = 0;
        foreach($piutang as $item) {
            $nominalPiutang += $item->tbpDetail ? $item->nominal-$item->tbpDetail->nominal : $item->nominal;
        }
        $totalNominalTbp = $tbpRepository->getPaymentToday();

        $data1 = '';
        $tbpSkrd1 = $this->tbpRepository->sumAll();
        foreach ($tbpSkrd1 as $value) {
            $data1 .= "{ year:'".$value["tahun"]."',

                nominal:".$value["total"]." }";
            # code...
        }

        return view('dashboard', compact('totalKlasifikasi', 'nominalPiutang', 'totalNominalTbp', 'tahun', 'yearActive'));
    }
}
