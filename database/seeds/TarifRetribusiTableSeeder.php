<?php

use App\Entity\Master\TarifRetribusi;
use App\Entity\Master\KlasifikasiPemakaian;
use Illuminate\Database\Seeder;

class TarifRetribusiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tempatTinggal = KlasifikasiPemakaian::where('jenis_klasifikasi', 'Tempat Tinggal')->first();
        $kegiatanIndustri = KlasifikasiPemakaian::where('jenis_klasifikasi', 'Kegiatan Industri')->first();
        $kios = KlasifikasiPemakaian::where('jenis_klasifikasi', 'Usaha Toko / Kios')->first();
        $spbu = KlasifikasiPemakaian::where('jenis_klasifikasi', 'SPBU / Pom Bensin')->first();
        // $pertanian = KlasifikasiPemakaian::where('jenis_klasifikasi', 'Pertanian')->first();
        $pendidikan = KlasifikasiPemakaian::where('jenis_klasifikasi', 'Pendidikan')->first();
        $sosial = KlasifikasiPemakaian::where('jenis_klasifikasi', 'Sosial')->first();

        $list = [
            ['1', 'A', '0 - 15.000.000', $tempatTinggal->id, 500],
            ['1', 'B', '15.000.000 - 50.000.000', $tempatTinggal->id, 750],
            ['1', 'C', '50.000.000 - 100.000.000', $tempatTinggal->id, 1250],
            ['1', 'D', '100.000.000 - 300.000.000', $tempatTinggal->id, 1750],
            ['1', 'E', '300.000.000 - 500.000.000', $tempatTinggal->id, 2500],
            ['1', 'F', '> 500.000.000', $tempatTinggal->id, 3000],
            ['2', 'A', '0 - 75.000.000', $kegiatanIndustri->id, 5000],
            ['2', 'B', '75.000.000 - 150.000.000', $kegiatanIndustri->id, 5500],
            ['2', 'C', '150.000.000 - 250.000.000', $kegiatanIndustri->id, 6000],
            ['2', 'D', '250.000.000 - 400.000.000', $kegiatanIndustri->id, 6500],
            ['2', 'E', '400.000.000 - 600.000.000', $kegiatanIndustri->id, 7000],
            ['2', 'F', '600.000.000 - 800.000.000', $kegiatanIndustri->id, 7500],
            ['2', 'G', '> 800.000.000', $kegiatanIndustri->id, 8000],
            ['3', 'A', '0 - 50.000.000', $kios->id, 2000],
            ['3', 'B', '50.000.000 - 100.000.000', $kios->id, 2500],
            ['3', 'C', '100.000.000 - 170.000.000', $kios->id, 3000],
            ['3', 'D', '170.000.000 - 300.000.000', $kios->id, 4000],
            ['3', 'E', '300.000.000 - 500.000.000', $kios->id, 5000],
            ['3', 'F', '500.000.000 - 700.000.000', $kios->id, 6000],
            ['3', 'G', '> 750.000.000', $kios->id, 7500],
            ['4', 'A', '0 - 100.000.000', $spbu->id, 15000],
            ['4', 'B', '100.000.000 - 100.000.000', $spbu->id, 16000],
            ['4', 'C', '200.000.000 - 300.000.000', $spbu->id, 17000],
            ['4', 'D', '300.000.000 - 450.000.000', $spbu->id, 18000],
            ['4', 'E', '450.000.000 - 600.000.000', $spbu->id, 19000],
            ['4', 'F', '600.000.000 - 750.000.000', $spbu->id, 20000],
            ['4', 'G', '> 750.000.000', $spbu->id, 21000],
            // ['5', 'A', 'Klasifikasi A', $pertanian->id, 300],
            // ['5', 'B', 'Klasifikasi B', $pertanian->id, 250],
            // ['5', 'C', 'Klasifikasi C', $pertanian->id, 200],
            ['6', 'A', 'Taman Kanak-Kanak', $pendidikan->id, 100],
            ['6', 'B', 'Sekolah Dasar', $pendidikan->id, 200],
            ['6', 'C', 'SMP', $pendidikan->id, 250],
            ['6', 'D', 'SMA', $pendidikan->id, 300],
            ['6', 'E', 'PT', $pendidikan->id, 500],
            ['6', 'F', 'Lembaga Pendidikan Lainnya', $pendidikan->id, 500],
            ['7', 'A', 'Keagamaan', $sosial->id, 100],
            ['7', 'B', 'Kemasyarakatan', $sosial->id, 500],
        ];

        foreach($list as $tarif) {
            TarifRetribusi::create([
                'kelas' => $tarif[0], 
                'golongan' => $tarif[1], 
                'range_njop' => $tarif[2],
                'kode_tarif' => $tarif[0] . $tarif[1],
                'klasifikasi_pemakaian_id' => $tarif[3],
                'tarif_meter' => $tarif[4]
            ]);
        }
    }
}
