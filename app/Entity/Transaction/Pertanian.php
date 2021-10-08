<?php

namespace App\Entity\Transaction;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Pertanian extends Model
{
    /**
     * Definde table name
     */
    protected $table = 'pertanian';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_perjanjian_sewa', 'nama_penyewa', 'lokasi', 'luas', 'jenis_tanaman', 'nominal', 'tanggal_sewa', 'status', 'keterangan'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['nominal_idr'];
 
    /**
     * Status Pembayaran: Sudah Bayar
     * 
     * @var string
     */
    public const PAID = 'paid';

    /**
     * Status Pembayaran: Belum Bayar
     * 
     * @var string
     */
    public const UNPAID = 'unpaid';

    /**
     * Get format nomor
     *
     * @return void
     */
    public function getNominalIdrAttribute()
    {
        return format_idr($this->attributes['nominal']);
    }

    /**
     * Get pretty date formatted
     *
     * @return void
     */
    public function getPrettyDate()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['tanggal_sewa'])->translatedFormat('d F Y');
    }

    /**
     * Formatted status
     *
     * @return void
     */
    public function getStatusAttribute()
    {
        switch($this->attributes['status'])
        {
            case self::PAID: return 'Sudah Bayar'; break;
            case self::UNPAID: return 'Belum Bayar'; break;
        }
    }
}
