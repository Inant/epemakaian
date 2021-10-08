<?php

use App\Entity\Master\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            // Klojen
            ['133151020000', 1, 'Klojen'],
            ['133151030000', 1, 'Rampal Celaket'],
            ['133151040000', 1, 'Samaan'],
            ['133151050000', 1, 'Kidul Dalem'],
            ['133151060000', 1, 'Sukoharjo'],
            ['133151070000', 1, 'Kasin'],
            ['133151080000', 1, 'Kauman'],
            ['133151090000', 1, 'Oro-Oro Dowo'],
            ['133151100000', 1, 'Bareng'],
            ['133151110000', 1, 'Gading Kasri'],
            ['133151120000', 1, 'Penanggungan'],
            // Blimbing
            ['133150060000', 2, 'Blimbing'],
            ['133150040000', 2, 'Polowijen'],
            ['133150030000', 2, 'Arjosari'],
            ['133150050000', 2, 'Purwodadi'],
            ['133150070000', 2, 'Pandanwangi'],
            ['133150080000', 2, 'Purwantoro'],
            ['133150090000', 2, 'Bunulrejo'],
            ['133150100000', 2, 'Kesatrian'],
            ['133150110000', 2, 'Polehan'],
            ['133150120000', 2, 'Jodipan'],
            ['133150020000', 2, 'Balearjosari'],
            // Kedungkandang
            ['133152070000', 3, 'Kedungkandang'],
            ['133152020000', 3, 'Kotalama'],
            ['133152030000', 3, 'Mergosono'],
            ['133152040000', 3, 'Bumiayu'],
            ['133152050000', 3, 'Wonokoyo'],
            ['133152060000', 3, 'Buring'],
            ['133152080000', 3, 'Lesanpuro'],
            ['133152090000', 3, 'Sawojajar'],
            ['133152100000', 3, 'Madyopuro'],
            ['133152110000', 3, 'Cemorokandang'],
            ['133152120000', 3, 'Arjowinangun'],
            ['133152130000', 3, 'Tlogowaru'],
            // Lowokwaru
            ['133154120000', 4, 'Lowokwaru'],
            ['133154050000', 4, 'Dinoyo'],
            ['133154060000', 4, 'Sumbersari'],
            ['133154070000', 4, 'Ketawanggede'],
            ['133154080000', 4, 'Jatimulyo'],
            ['133154090000', 4, 'Tunjungsekar'],
            ['133154100000', 4, 'Mojolangu'],
            ['133154110000', 4, 'Tulusrejo'],
            ['133154130000', 4, 'Tasikmadu'],
            ['133154020000', 4, 'Tunggulwulung'],
            ['133154040000', 4, 'Tlogomas'],
            ['133154030000', 4, 'Merjosari'],
            // Sukun
            ['133153060000', 5, 'Sukun'],
            ['133153020000', 5, 'Ciptomulyo'],
            ['133153030000', 5, 'Gadang'],
            ['133153040000', 5, 'Kebonsari'],
            ['133153050000', 5, 'Bandungrejosari'],
            ['133153070000', 5, 'Tanjung Rejo'],
            ['133153080000', 5, 'Pisangcandi'],
            ['133153090000', 5, 'Karang Besuki'],
            ['133153100000', 5, 'Bandulan'],
            ['133153110000', 5, 'Mulyorejo'],
            ['133153120000', 5, 'Bakalankrajan'],
        ];
        
        foreach($list as $kecamatan) {
            Kelurahan::create([
                'kode_administratif' => $kecamatan[0],
                'kecamatan_id' => $kecamatan[1],
                'nama' => $kecamatan[2]
            ]);
        }
    }
}
