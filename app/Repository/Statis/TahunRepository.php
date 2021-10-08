<?php

namespace App\Repository\Statis;

use App\Entity\Statis\Tahun;

class TahunRepository
{
    /**
     * Get all akun.
     *
     * @return Collection
     */
    public function all()
    {
        return Tahun::orderBy('id', 'desc')->get();
    }

    /**
     * Get tahun by id
     *
     * @param [int] $id
     * @return Tahun
     */
    public function findById($id)
    {
        return Tahun::find($id);
    }

    /**
     * Create tahun.
     *
     * @param array $attributes
     * @return JenisPembayaran
     */
    public function create(array $attributes)
    {
        return Tahun::create([
            'tahun' => $attributes['tahun'],
        ]);
    }

    /**
     * Edit tahun.
     *
     * @param int|string $id
     * @param array $attributes
     * @return JenisPembayaran
     */
    public function update($id, array $attributes)
    {
        return Tahun::findOrFail($id)->update([
            'tahun' => $attributes['tahun'],
        ]);
    }
}