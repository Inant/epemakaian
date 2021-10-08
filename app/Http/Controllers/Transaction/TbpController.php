<?php

namespace App\Http\Controllers\Transaction;

use Exception;
use Illuminate\Http\Request;
use App\Entity\Transaction\Tbp;

use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\TbpRequest;
use App\Repository\Transaction\TbpRepository;
use App\Repository\Statis\RekeningBankRepository;
use App\Repository\Statis\TahunRepository;
use App\Repository\Transaction\TbpInsidentilRepository;
use App\Repository\Transaction\JenisPembayaranRepository;

class TbpController extends Controller
{
    /**
     * Tbp repository
     *
     * @var TbpRepository
     */
    private $tbpRepository;

    /**
     * Tbp insidentil repository
     *
     * @var TbpInsidentilRepository
     */
    private $tbpInsidentilRepository;

    /**
     * Tahun repository
     *
     * @var TahunRepository
     */
    private $tahunRepository;

    /**
     * Tbp Repository
     *
     * @param TbpRepository $tbpRepository
     */
    public function __construct(
        TbpRepository $tbpRepository,
        TbpInsidentilRepository $tbpInsidentilRepository,
        TahunRepository $tahunRepository
    )
    {
        $this->tbpRepository = $tbpRepository;
        $this->tbpInsidentilRepository = $tbpInsidentilRepository;
        $this->tahunRepository = $tahunRepository;
    }

    /**
     * Index.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $yearActive = $request->year ? $request->year : date('Y');
        $attributes = array_merge(['year' => $yearActive], $request->all());

        $tahun = $this->tahunRepository->all();
        $tbpSkrd = $this->tbpRepository->all($attributes);
        $tbpSkrd1 = $this->tbpRepository->sumAll();
        $tbpInsidentil = $this->tbpInsidentilRepository->all();
        // $tbpSkrd1->appends($request->query());
        // echo '<pre>';
        // print_r($tbpSkrd1);
        // echo '</pre>';
        // return false;
        $tbpInsidentil->appends($request->query());

        return view('tbp.index', [
            'tbpSkrd' => $tbpSkrd,
            'tbpInsidentil' => $tbpInsidentil,
            'tahun' => $tahun,
            'yearActive' => $yearActive,
        ]);
    }

    /**
     * Form create
     *
     * @param RekeningBankRepository $rekeningBankRepository
     * @param JenisPembayaranRepository $jenisPembayaranRepository
     * @return void
     */
    public function create(
        RekeningBankRepository $rekeningBankRepository,
        JenisPembayaranRepository $jenisPembayaranRepository
    ) {
        $rekeningBank = $rekeningBankRepository->all();
        $jenisPembayaran = $jenisPembayaranRepository->all();
        return view('tbp.create', [
            'rekeningBank' => $rekeningBank,
            'jenisPembayaran' => $jenisPembayaran
        ]);
    }

    /**
     * Create action.
     *
     * @param TbpRequest $request
     * @return void
     */
    public function store(TbpRequest $request)
    {
        try {
            if ($request->nomor_auto) {
                $nomor = $this->tbpRepository->getLastNomor();
                $nomorOtomatis = true;
            } else {
                $nomor = $request->nomor;
                $nomorOtomatis = false;
            }

            $jenis = Tbp::JENIS_SKRD;
            if ($request->skrd_radio == 'no_skrd') {
                $jenis = Tbp::JENIS_OBJECT_RETRIBUSI;
            }

            $this->tbpRepository->create(
                $request->all(),
                $jenis,
                $nomor,
                $nomorOtomatis
            );

            return redirect()->route('tbp.index')
                        ->with('success', 'TBP berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()
                        ->with('error', 'Terjadi kesalahan saat menyimpan TBP');
        }
    }

    /**
     * Form edit
     *
     * @param RekeningBankRepository $rekeningBankRepository
     * @param JenisPembayaranRepository $jenisPembayaranRepository
     * @param string|int $id
     * @return void
     */
    public function edit(
        RekeningBankRepository $rekeningBankRepository,
        JenisPembayaranRepository $jenisPembayaranRepository,
        $id
    ) {
        $tbp = $this->tbpRepository->find($id);
        $rekeningBank = $rekeningBankRepository->all();
        $jenisPembayaran = $jenisPembayaranRepository->all();
        return view('tbp.edit', [
            'tbp' => $tbp,
            'rekeningBank' => $rekeningBank,
            'jenisPembayaran' => $jenisPembayaran
        ]);
    }

    /**
     * Edit action.
     *
     * @param TbpRequest $request
     * @param string|int $id
     * @return void
     */
    public function update(TbpRequest $request, $id)
    {
        try {
            $jenis = Tbp::JENIS_SKRD;
            if ($request->skrd_radio == 'no_skrd') {
                $jenis = Tbp::JENIS_OBJECT_RETRIBUSI;
            }

            $this->tbpRepository->edit(
                $id,
                $request->all(),
                $jenis
            );

            return redirect()->route('tbp.index')
                        ->with('success', 'TBP berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()
                        ->with('error', 'Terjadi kesalahan saat menyimpan TBP');
        }
    }

    /**
     * Delete action.
     *
     * @param string|int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->tbpRepository->delete($id);
        return redirect()->route('tbp.index')
                    ->with('success', 'TBP berhasil dihapus');
    }

    /**
     * Cetak TBP
     *
     * @param [type] $id
     * @return PDF
     */
    public function print(
        PDF $pdf,
        RekeningBankRepository $rekeningBankRepository,
        JenisPembayaranRepository $jenisPembayaranRepository,
        $id
    )
    {
        $tbp = $this->tbpRepository->find($id);
        $totalBayar = $tbp->tbpDetail()->sum('nominal');

        return $pdf::loadview('layouts.report.cetak_tbp', compact('tbp', 'totalBayar'))
        ->stream('cetak_tbp.pdf', ['Attachment' => false]);
    }
}
