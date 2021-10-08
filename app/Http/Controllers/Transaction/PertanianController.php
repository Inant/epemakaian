<?php

namespace App\Http\Controllers\Transaction;

use App\Entity\Transaction\Pertanian;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\PertanianRequest;
use App\Repository\Transaction\PertanianRepository;
use Illuminate\Http\Request;

class PertanianController extends Controller
{
    /**
     * SKRD Repository
     *
     * @var PertanianRepository
     */
    private $pertanianRepository;

    public function __construct(PertanianRepository $pertanianRepository)
    {
        $this->pertanianRepository = $pertanianRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pertanian = $this->pertanianRepository->allPaginate([
            'keyword' => $request->keyword
        ]);

        $pertanian->appends($request->query());
        
        return view('pertanian.index', compact('pertanian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PertanianRequest $request)
    {
        try {
            $this->pertanianRepository->create($request->all());

            return redirect()->route('pertanian.index')
                        ->with('success', 'Lahan Pertanian berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()
                        ->with('error', 'Terjadi kesalahan saat menyimpan Lahan Pertanian');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pertanian  $pertanian
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanian $pertanian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pertanian  $pertanian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanian = $this->pertanianRepository->find($id);
        return view('pertanian.edit', compact('pertanian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pertanian  $pertanian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanian $pertanian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pertanian  $pertanian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->pertanianRepository->delete($id);

        return redirect()->route('pertanian.index')
            ->with('success', 'Data Lahan Pertanian berhasil dihapus');
    }
}
