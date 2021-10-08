<?php

namespace App\Repository\Master;

use App\Entity\Master\KlasifikasiPemakaian;
class KlasifikasiPemakaianRepository
{
    /**
     * Get all klasifikasi pemakaian.
     *
     * @return Collection
     */
    public function all()
    {
        return KlasifikasiPemakaian::orderBy('jenis_klasifikasi', 'asc')->get();
    }

    /**
     * Get klasifikasi pemakaian by id
     *
     * @param [int] $id
     * @return KlasifikasiPemakaian
     */
    public function findById($id)
    {
        return KlasifikasiPemakaian::find($id);
    }

    /**
     * Get klasifikasi pemakaian by Name.
     *
     * @return Boolean
     */
    public function findByName($name)
    {
        return KlasifikasiPemakaian::where('jenis_klasifikasi', $name)->exists();
    }

    /**
     * Create klasifikasi pemakaian.
     *
     * @param array $attributes
     * @return KlasifikasiPemakaian
     */
    public function create(array $attributes)
    {
        return KlasifikasiPemakaian::create([
            'jenis_klasifikasi' => $attributes['jenis_klasifikasi'],
        ]);
    }

    /**
     * Edit Klasifikasi Pemakaian.
     *
     * @param int|string $id
     * @param array $attributes
     * @return KlasifikasiPemakaian
     */
    public function update($id, array $attributes)
    {
        return KlasifikasiPemakaian::findOrFail($id)->update([
            'jenis_klasifikasi' => $attributes['jenis_klasifikasi']
        ]);
    }

    /**
     * Delete Klasifikasi Pemakaian.
     *
     * @param int|string $id
     * @return KlasifikasiPemakaian
     */
    public function delete($id)
    {
        return KlasifikasiPemakaian::findOrFail($id)->delete();
    }

    public function countObject()
    {
        return KlasifikasiPemakaian::withCount('totalKlasifikasi')->get();
    }
}
