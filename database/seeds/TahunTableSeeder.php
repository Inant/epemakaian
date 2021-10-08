<?php

use App\Entity\Statis\Tahun;
use Illuminate\Database\Seeder;

class TahunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($year = 2013; $year <= 2025; $year++)
            Tahun::create(['tahun' => $year]);
    }
}
