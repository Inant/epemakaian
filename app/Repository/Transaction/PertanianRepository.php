<?php

namespace App\Repository\Transaction;

use App\Entity\Transaction\Pertanian;

class PertanianRepository
{
    /**
     * Return all pertanian
     *
     * @return Collection
     */
    public function all()
    {
        return Pertanian::orderBy('id', 'desc')->get();
    }

    /**
     * Get all pertanian with pagination.
     *
     * @return Collection
     */
    public function allPaginate(array $attributes)
    {
        $keyword = null;

        if($attributes['keyword'])
            $keyword = $attributes['keyword'];
            
        return Pertanian::orderBy('created_at', 'desc')
            ->when($keyword, function($query) use($keyword) {
                $query->where('nama_penyewa', 'like', '%' . $keyword . '%');
            })
            ->paginate(10);
    }

     /**
     * Get Pertanian by id
     *
     * @param [int] $id
     * @return Pertanian
     */
    public function find($id)
    {
        return Pertanian::findOrFail($id)->first();
    }

    /**
     * Create Pertanian.
     *
     * @param array $attributes
     * @return Pertanian
     */
    public function create(array $attributes)
    {
        return Pertanian::create([
            'no_perjanjian_sewa' => $attributes['no_perjanjian_sewa'],
            'nama_penyewa' => $attributes['nama_penyewa'],
            'lokasi' => $attributes['lokasi'],
            'nominal' => $attributes['nominal'],
            'tanggal_sewa' => $attributes['tanggal_sewa'],
            'status' => $attributes['status'],
            'keterangan' => $attributes['keterangan'],
        ]);
    }

    /**
     * Edit Pertanian.
     *
     * @param int|string $id
     * @param array $attributes
     * @return Pertanian
     */
    public function update(array $attributes, $id)
    {
        return Pertanian::findOrFail($id)->update([
            'no_perjanjian_sewa' => $attributes['no_perjanjian_sewa'],
            'nama_penyewa' => $attributes['nama_penyewa'],
            'lokasi' => $attributes['lokasi'],
            'nominal' => $attributes['nominal'],
            'tanggal_sewa' => $attributes['tanggal_sewa'],
            'status' => $attributes['status'],
            'keterangan' => $attributes['keterangan'],
        ]);
    }

    /**
     * Delete Pertanian.
     *
     * @param int|string $id
     * @return Pertanian
     */
    public function delete($id)
    {
        return Pertanian::findOrFail($id)->delete();
    }
}
