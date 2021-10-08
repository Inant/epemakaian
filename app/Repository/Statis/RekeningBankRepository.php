<?php

namespace App\Repository\Statis;

use App\Entity\Statis\RekeningBank;

class RekeningBankRepository
{
    /**
     * Get all rekening bank.
     *
     * @return Collection
     */
    public function all()
    {
        return RekeningBank::with('akunBendahara')->orderBy('nama_bank', 'asc')->get();
    }

    /**
     * Get rekening bank by id
     *
     * @param [int] $id
     * @return RekeningBanks
     */
    public function findById($id)
    {
        return RekeningBank::find($id);
    }

    /**
     * Create rekening bank.
     *
     * @param array $attributes
     * @return RekeningBank
     */
    public function create(array $attributes)
    {
        return RekeningBank::create([
            'nama_bank' => $attributes['nama_bank'],
            'no_rekening' => $attributes['no_rekening'],
            'akun_bendahara_id' => $attributes['akun_bendahara_id'],
        ]);
    }

    /**
     * Edit rekening bank.
     *
     * @param int|string $id
     * @param array $attributes
     * @return RekeningBank
     */
    public function update($id, array $attributes)
    {
        return RekeningBank::findOrFail($id)->update([
            'nama_bank' => $attributes['nama_bank'],
            'no_rekening' => $attributes['no_rekening'],
            'akun_bendahara_id' => $attributes['akun_bendahara_id'],
        ]);
    }

    /**
     * Delete rekening bank.
     *
     * @param int|string $id
     * @return RekeningBank
     */
    public function delete($id)
    {
        return RekeningBank::findOrFail($id)->delete();
    }
}
