<?php

use Illuminate\Database\Seeder;
use App\Entity\Master\KlasifikasiPemakaian;

class KlasifikasiPemakaianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $klasifikasi = ['Tempat Tinggal', 'Kegiatan Industri', 'Usaha Toko / Kios', 'SPBU / Pom Bensin', 'Pendidikan', 'Sosial'];

        foreach($klasifikasi as $item) {
            $insertModel = [
                'jenis_klasifikasi' => $item
            ];
            KlasifikasiPemakaian::create($insertModel);
        }
    }
}
