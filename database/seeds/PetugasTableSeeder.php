<?php

use Illuminate\Database\Seeder;
use App\Entity\User\Petugas;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['Ir. SAPTO P. SANTOSO, M.Si', '19610329199103 1 005', 'XXX', 'Pembina Utama Muda', 0],
            ['EMMIE RISTANTIEN, SE, M.Si', '19670814 198903 2 010', 'PPK-SKPD', 'Pembina', 1],
            ['SATRIA YUDHA P., S.STP', '19910805 201406 1 001', 'Bendahara Pengeluaran', 'Penata Muda Tk. I', 1],
            ['FETI MAISAROH', '19670225 200701 2 005', 'Bendahara Penerimaan', 'Pengatur', 1],
            ['BAIHAQI, S,Pd., SE., M.Si', '19670317 199202 1 001', 'Pejabat Pembuat Komitmen', 'Pembina Tk. I', 1],
            ['DIEN KORI YUANTI, SE., M.Si', '19631119 199111 2 001', 'PPTK', 'Penata Tk. 1', 1],
            ['PARIYONO, SE', '19640716 199302 1 001', 'PPTK', 'Penata Tk. I', 1],
            ['DEWI PRATIWININGRUM, SE, MM', '19670516 199503 2 001', 'PPTK', 'Pembina', 1],
            ['ONY SETIAWAN, SE., MM', '19740829 200312 1 006', 'PPTK', 'Penata Tk. I', 1],
            ['MISBAHUL ANAM, SH', '19630403 198503 1 015', 'PPTK', 'Penata', 1],
        ];

        foreach($list as $item)
        {
            Petugas::create([
                'opd_id' => 1,
                'nama' => $item[0],
                'nip' => $item[1],
                'jabatan' => $item[2],
                'pangkat' => $item[3],
                'is_active' => $item[4],
            ]);
        }
    }
}
