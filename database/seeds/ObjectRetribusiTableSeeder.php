<?php

use App\Entity\Master\Kelurahan;
use App\Entity\Master\ObjekRetribusi;
use App\Entity\Master\TarifRetribusi;
use App\Entity\User\Pemakai;
use Illuminate\Database\Seeder;

class ObjectRetribusiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ObjekRetribusi::create([
            'kode' => 'A001',
            'pemakai_id' => Pemakai::get()->first()->id,
            'kelurahan_id' => Kelurahan::where('nama', 'Bandulan')->get()->first()->id,
            'lokasi' => 'Malang, Sukun',
            'luas' => 10,
            'tarif_retribusi_id' => TarifRetribusi::get()->first()->id
        ]);

        ObjekRetribusi::create([
            'kode' => 'A002',
            'pemakai_id' => Pemakai::get()->first()->id,
            'kelurahan_id' => Kelurahan::where('nama', 'Rampal Celaket')->get()->first()->id,
            'lokasi' => 'Malang, Klojen',
            'luas' => 30,
            'tarif_retribusi_id' => TarifRetribusi::get()->first()->id
        ]);

        ObjekRetribusi::create([
            'kode' => 'A003',
            'pemakai_id' => Pemakai::get()->first()->id,
            'kelurahan_id' => Kelurahan::where('nama', 'Jodipan')->get()->first()->id,
            'lokasi' => 'Malang, Blimbing',
            'luas' => 15,
            'tarif_retribusi_id' => TarifRetribusi::get()->first()->id
        ]);
    }
}
