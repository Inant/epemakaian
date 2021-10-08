<?php

use App\Entity\Transaction\Pertanian;
use Illuminate\Database\Seeder;

class PertanianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 15; $i++)
        {
            Pertanian::create([
                'no_perjanjian_sewa' => str_pad($i, 4, 0, STR_PAD_LEFT) . '/Pertanian/2020',
                'nama_penyewa' => 'Taylor Otwell',
                'lokasi' => 'Sukun, Malang',
                'nominal' => 1500000,
                'tanggal_sewa' => '2020-01-01',
                'status' => $this->randomStatus(),
                'keterangan' => 'Luas tanah 200 meter',
            ]);
        }
    }

    private function randomStatus() : string
    {
        $status = ['paid', 'unpaid'];
        $shuffle = array_rand($status);
        return $status[$shuffle];
    }
}
