<?php

namespace App\Repository\Master;

use App\Entity\Master\TarifRetribusi;

class TarifRetribusiRepository
{
    /**
     * Get all Tarif retribusi.
     *
     * @return Collection
     */
    public function all()
    {
        return TarifRetribusi::orderBy('id', 'desc')->with('klasifikasiPemakaian')->get();
    }

    /**
     * Create Tarif retribusi.
     *
     * @param array $attributes
     * @return TarifRetribusi
     */
    public function create(array $attributes)
    {
        return TarifRetribusi::create([
            'kelas' => $attributes['kelas'], 
            'golongan' => $attributes['golongan'],
            'range_njop' => $attributes['range_njop'],
            'kode_tarif' => $attributes['kode_tarif'],  
            'klasifikasi_pemakaian_id' => $attributes['klasifikasi_pemakaian'],
            'tarif_meter' => $attributes['tarif_meter']
        ]);
    }

    /**
     * Get Tarif retribusi by did
     *
     * @param [int] $id
     * @return TarifRetribusi
     */
    public function find($id)
    {
        return TarifRetribusi::where('id', $id)->with('klasifikasiPemakaian')->first();
    }


    /**
     * Delete Tarif retribusi.
     *
     * @param int|string $id
     * @return TarifRetribusi
     */
    public function delete($id)
    {
        return TarifRetribusi::findOrFail($id)->delete();
    }

    /**
     * Update Tarif retribusi.
     *
     * @param array $attributes
     * @return TarifRetribusi
     */
    public function update($id, array $attributes)
    {
        return TarifRetribusi::findOrFail($id)->update([
            'kelas' => $attributes['kelas'],
            'golongan' => $attributes['golongan'],
            'range_njop' => $attributes['range_njop'],
            'kode_tarif' => $attributes['kode_tarif'],
            'klasifikasi_pemakaian_id' => $attributes['klasifikasi_pemakaian'],
            'tarif_meter' => $attributes['tarif_meter']
        ]);
    }

    /**
     * Update kelas and golongan
     *
     * @param [type] $id
     * @param array $attributes
     * @return void
     */
    public function updateTarif($id, array $attributes)
    {
        TarifRetribusi::findOrFail($id)->update([
            'kelas' => $attributes['kelas'],
            'golongan' => $attributes['golongan'],
        ]);

        return TarifRetribusi::find($id);
    }
}
