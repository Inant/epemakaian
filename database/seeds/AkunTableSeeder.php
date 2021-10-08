<?php

use Illuminate\Database\Seeder;
use App\Entity\Statis\Akun;

class AkunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akun::create([
            'kode' => '4.1.2.02.01',
            'nama' => 'Badan Keuangan dan Aset Daerah'
        ]);

        Akun::create([
            'kode' => '1.1.1.03.60',
            'nama' => 'Kas Bank di Bendahara Penerimaan'
        ]);
    }
}
