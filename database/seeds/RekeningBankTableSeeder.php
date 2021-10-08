<?php

use Illuminate\Database\Seeder;
use App\Entity\Statis\RekeningBank;
use App\Entity\Statis\Akun;

class RekeningBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $akun = Akun::where('kode', '1.1.1.03.60')->first();
        if($akun) {
            RekeningBank::create([
                'nama_bank' => 'Bank Jatim',
                'no_rekening' => '0041048484',
                'akun_bendahara_id' => $akun->id, 
            ]);
        }
    }
}
