<?php 

namespace App\Http\Controllers\Reports;

use App\Repository\Master\KecamatanRepository;
use App\Repository\Transaction\SkrdRepository;
use Illuminate\Http\Request;

class ReportWrKecamatanController extends BaseReportController {
    
    protected $layout;
    protected $title;
    protected $orientation;

    public function setData($request)
    {
        $kecamatanRepository = app(KecamatanRepository::class);
        $skrdRepository = app(SkrdRepository::class);

        $kecamatan = $kecamatanRepository->find($request->kecamatan);
        $tahun = $request->tahun;
        $skrds = $skrdRepository->getSkrdKecamatan($request->only('kecamatan', 'tahun', 'status'));

        return [
            'tahun' => $tahun, 
            'kecamatan' => $kecamatan, 
            'skrds' => $skrds
        ];
    }

    public function print(Request $request)
    {
        $kecamatanRepository = app(KecamatanRepository::class);
        $kecamatan = $kecamatanRepository->find($request->kecamatan);
        
        $this->layout = 'wr_per_kecamatan';
        $this->title = 'Laporan Wajib Retribusi Kecamatan ' . $kecamatan->nama . ' Tahun '. $request->tahun;
        $this->orientation = 'landscape';
        return $this->printHtml($request);
    }
}