<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Master\KlasifikasiPemakaianRepository;
use App\Repository\Master\ObjectRetribusiRepository;
use App\Repository\Statis\TahunRepository;
use App\Repository\Transaction\MonitoringPiutangRepository;
use App\Repository\Transaction\TbpRepository;
use App\Repository\Transaction\SkrdRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SkrdRepository $skrdRepository,
        TbpRepository $tbpRepository
    )
    {
        $this->tbpRepository = $tbpRepository;
        $this->skrdRepository = $skrdRepository;
        // $this->middleware('auth');
    }

    /**
     * Show the application landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(
        Request $request,
        KlasifikasiPemakaianRepository $klasifikasiRepository,
        ObjectRetribusiRepository $objectRetribusiRepository,
        TbpRepository $tbpRepository,
        SkrdRepository $skrdRepository,
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

        //data penerimaan poer tahun
        $data1 = '';
        $tbpSkrd1 = $this->tbpRepository->sumAll();
        // return $tbpSkrd1;
        foreach ($tbpSkrd1 as $value) {
            $data1 .= "{ year:'".$value["tahun"]."',

                value:".$value["total"]." },";
            # code...
        }
        // return $data1;
        //data piutang poer tahun
        $data2 = '';
        $gpiutang = $this->skrdRepository->sumAll();
        // return $gpiutang;
        foreach ($gpiutang as $value) {
            $total = $value->total;
            $ttl = $value->ttl;
            $piutang = $total-$ttl;
            $data2 .= "{ year:'".$value->tahun."',

                value:".$piutang." },";
            # code...
        }
        

        return view('landing', compact('totalKlasifikasi', 'nominalPiutang', 'totalNominalTbp', 'tahun', 'yearActive','data1','data2'));
    }
    public function grafik_piutang(SkrdRepository $skrdRepository){
        $data1 = '';
        $tbpSkrd1 = $this->tbpRepository->sumAllKecamatan(2020);
        return $tbpSkrd1;
        foreach ($tbpSkrd1 as $value) {
            $data1 .= "{ year:'".$value["tahun"]."',

                value:".$value["total"]." },";
            # code...
        }
        return $data1;

    }
}
