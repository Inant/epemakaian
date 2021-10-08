<?php

use Illuminate\Database\Seeder;
use App\Entity\Transaction\JenisPembayaran;

class JenisPembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenisPembayaran = [
            ['TBP-OA', 'TBP', 'Digunakan di TBP untuk penerimaan pembayaran berdasarkan penetapan SKRD khusus tahun aktif saat ini'],
            ['TBP-PUTG', 'TBP', 'Digunakan di TBP untuk penerimaan pembayaran berdasarkan penetapan SKRD khusus tahun lalu < tahun aktif saat ini'],
            ['TBP-SA', 'TBP', 'Digunakan di TBP untuk penerimaan tidak berdasarkan SKRD']
        ];

        foreach($jenisPembayaran as $index => $item) {
            $insertModel = [
                'kode_jurnal' => $item[0],
                'formulir' => $item[1],
                'deskripsi' => $item[2],
            ];
            JenisPembayaran::create($insertModel);
        }
    }
}
