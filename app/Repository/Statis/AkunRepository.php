<?php

namespace App\Repository\Statis;

use App\Entity\Statis\Akun;

class AkunRepository
{
    /**
     * Get all akun.
     *
     * @return Collection
     */
    public function all()
    {
        return Akun::orderBy('kode', 'asc')->get();
    }

    /**
     * Get akun by id
     *
     * @param [int] $id
     * @return Akun
     */
    public function findById($id)
    {
        return Akun::find($id);
    }

    /**
     * Create akun.
     *
     * @param array $attributes
     * @return Akun
     */
    public function create(array $attributes)
    {
        return Akun::create([
            'kode' => $attributes['kode'],
            'nama' => $attributes['nama'],
        ]);
    }

    /**
     * Edit akun.
     *
     * @param int|string $id
     * @param array $attributes
     * @return Akun
     */
    public function update($id, array $attributes)
    {
        return Akun::findOrFail($id)->update([
            'kode' => $attributes['kode'],
            'nama' => $attributes['nama'],
        ]);
    }

    /**
     * Delete akun.
     *
     * @param int|string $id
     * @return Akun
     */
    public function delete($id)
    {
        return Akun::findOrFail($id)->delete();
    }

    /**
     * Get akun bendahara
     *
     * @return void
     */
    public function getAkunBendahara(string $kodeAkun = '1.1.1.03.60')
    {
        return Akun::where('kode', $kodeAkun)->first();
    }
}
