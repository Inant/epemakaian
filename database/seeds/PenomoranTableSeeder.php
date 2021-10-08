<?php

use App\Entity\Statis\Penomoran;
use Illuminate\Database\Seeder;

class PenomoranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Penomoran::create([
            'formulir' => 'skrd', 
            'format_penomoran' => '{nomor:4}/SKRD/35.73.503/{tahun}'
        ]);
        Penomoran::create([
            'formulir' => 'tbp',
            'format_penomoran' => '{nomor:4}/3.02.01/TBP/{tahun}'
        ]);
    }
}
