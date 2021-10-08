<?php

use App\Entity\Transaction\Skrd;
use Illuminate\Database\Seeder;

class SkrdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skrd::create([
            'nomor' => 1, 
            'nomor_otomatis' => true,
            'tanggal' => '2020-01-01', 
            'pemakai_id' => 1, 
            'nominal' => 20000,
            'object_retribusi_id' => 1,
            'keterangan' => 'Skrd Tgl 01 Januari Taylor otwel'
        ]);

        Skrd::create([
            'nomor' => 2, 
            'nomor_otomatis' => true,
            'tanggal' => '2019-01-01', 
            'pemakai_id' => 1, 
            'nominal' => 30000,
            'object_retribusi_id' => 2,
            'keterangan' => 'Skrd Tgl 01 Januari Taylor otwel'
        ]);
    }
}
