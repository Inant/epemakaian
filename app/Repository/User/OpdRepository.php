<?php

namespace App\Repository\User;

use App\Entity\User\Opd;

class OpdRepository
{
    /**
     * Get all opd.
     *
     * @return Collection
     */
    public function all()
    {
        return Opd::orderBy('id', 'desc')->get();
    }

    /**
     * Find opd by id.
     *
     * @param int|string $id
     * @return Opd
     */
    public function find($id)
    {
        return Opd::findOrFail($id);
    }

    /**
     * Create opd.
     *
     * @param array $attributes
     * @return Opd
     */
    public function create(array $attributes)
    {
        return Opd::create([
            'kode' => $attributes['kode_opd'],
            'nama' => $attributes['nama_opd']
        ]);
    }

    /**
     * Edit opd.
     *
     * @param int|string $id
     * @param array $attributes
     * @return Opd
     */
    public function update($id, array $attributes)
    {
        return Opd::findOrFail($id)->update([
            'kode' => $attributes['kode_opd'],
            'nama' => $attributes['nama_opd']
        ]);
    }

    /**
     * Delete opd.
     *
     * @param int|string $id
     * @return Opd
     */
    public function delete($id)
    {
        return Opd::findOrFail($id)->delete();
    }

    /**
     * Get default OPD
     *
     * @return void
     */
    public function getOpdDefault()
    {
        return Opd::where('kode', '01')->first();
    }
}