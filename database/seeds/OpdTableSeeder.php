<?php

use App\Entity\User\Opd;
use Illuminate\Database\Seeder;

class OpdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opd::create([
            'kode' => '01',
            'nama' => 'Badan Keuangan dan Anggaran Daerah'
        ]);
    }
}
