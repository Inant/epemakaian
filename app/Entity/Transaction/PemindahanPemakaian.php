<?php

namespace App\Entity\Transaction;

use App\Entity\Statis\KlasifikasiPemakaian;
use App\Entity\Statis\ObjekRetribusi;
use App\Entity\User\Pemakai;
use Illuminate\Database\Eloquent\Model;

class PemindahanPemakaian extends Model
{
    /**
     * Definde table name
     */
    protected $table = 'pemindahan_pemakaian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'objek_retribusi_id', 'pemakai_lama', 'pemakai_baru', 'no_sk', 'tanggal_sk', 'klasifikasi_pemakaian_id'
    ];

    /**
     * relation to objek retribusi
     */
    public function objekRetribusi()
    {
        return $this->belongsTo(ObjekRetribusi::class);
    }

    /**
     * relation to pemakai
     */
    public function pemakaiLama()
    {
        return $this->belongsTo(Pemakai::class, 'id', 'pemakai_lama');
    }

    /**
     * relation to pemakai
     */
    public function pemakaiBaru()
    {
        return $this->belongsTo(Pemakai::class, 'id', 'pemakai_baru');
    }

    /**
     * relation to klasifikasi pemakaian
     */
    public function klasifikasiPemakaian()
    {
        return $this->belongsTo(KlasifikasiPemakaian::class);
    }
}
