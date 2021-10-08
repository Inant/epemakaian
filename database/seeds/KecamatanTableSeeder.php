<?php

use App\Entity\Master\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['133151000000', 'Klojen'],
            ['133150000000', 'Blimbing'],
            ['133152010000', 'Kedungkandang'],
            ['133154010000', 'Lowokwaru'],
            ['133153000000', 'Sukun'],
        ];

        foreach($list as $kecamatan) {
            Kecamatan::create([
                'kode_administratif' => $kecamatan[0],
                'nama' => $kecamatan[1]
            ]);
        }
    }
}
