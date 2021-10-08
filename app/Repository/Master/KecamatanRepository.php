<?php

namespace App\Repository\Master;

use App\Entity\Master\Kecamatan;

class KecamatanRepository
{
    /**
     * Get all opd.
     *
     * @return Collection
     */
    public function all()
    {
        return Kecamatan::orderBy('id', 'desc')->get();
    }

    /**
     * Create opd.
     *
     * @param array $attributes
     * @return Opd
     */
    public function create(array $attributes)
    {
        return Kecamatan::create([
            'nama' => $attributes['nama_kecamatan'],
            'kode_administratif' => $attributes['kode_administratif']
        ]);
    }

    /**
     * Get kecamatan by did
     *
     * @param [int] $id
     * @return Kecamatan
     */
    public function find($id)
    {
        return Kecamatan::findOrFail($id);
    }

    /**
     * Edit kecamatan.
     *
     * @param int|string $id
     * @param array $attributes
     * @return Kecamatan
     */
    public function update($id, array $attributes)
    {
        return Kecamatan::findOrFail($id)->update([
            'nama' => $attributes['nama_kecamatan'],
            'kode_administratif' => $attributes['kode_administratif']
        ]);
    }

    /**
     * Delete Kecamatan.
     *
     * @param int|string $id
     * @return Kecamatan
     */
    public function delete($id)
    {
        return Kecamatan::findOrFail($id)->delete();
    }
}
