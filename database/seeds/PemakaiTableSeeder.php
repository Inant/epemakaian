<?php

use App\Entity\User\Pemakai;
use Illuminate\Database\Seeder;

class PemakaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $number = 0;
        $pemakai = Pemakai::orderBy('id', 'desc')->first();
        if ($pemakai) $number = $pemakai->no_urut + 1;
        else $number += 1;

        Pemakai::create([
            'no_urut' => $number,
            'kelurahan_id' => 1,
            'nama' => 'Taylor Otwell',
            'nik' => '1234567890',
            'alamat' => 'Malang Raya',
            'no_telp' => '081538273927'
        ]);
    }
}
