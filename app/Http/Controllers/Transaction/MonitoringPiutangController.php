<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Repository\Master\ObjectRetribusiRepository;
use App\Repository\Statis\TahunRepository;
use App\Repository\Transaction\MonitoringPiutangRepository;
use App\Repository\Transaction\SkrdRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonitoringPiutangController extends Controller
{
    /**
     * SKRD Repository
     *
     * @var SKRDRepository
     */
    private $monitoringPiutangRepository;

    /**
     * Constructor
     */
    public function __construct(MonitoringPiutangRepository $monitoringPiutangRepository)
    {
        $this->monitoringPiutangRepository = $monitoringPiutangRepository;    
    }

    /**
     * Resources all monitoring piutang
     *
     * @return void
     */
    public function index(
        Request $request,
        TahunRepository $tahunRepository
    )
    {
        $piutang = $this->monitoringPiutangRepository->getPiutangPaginate($request->only(['keyword', 'year']));
        // $startYear = Carbon::now()->subYears(5)->format('Y');
        $yearActive = $request->year ? $request->year : date('Y');
        $tahun = $tahunRepository->all();
        $piutang->appends($request->query());

        return view('monitoringpiutang.index', compact('piutang', 'yearActive', 'tahun'));
    }
}
