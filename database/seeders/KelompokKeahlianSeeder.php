<?php

namespace Database\Seeders;

use App\Models\KelompokKeahlian;
use Illuminate\Database\Seeder;

class KelompokKeahlianSeeder extends Seeder
{
    public function run()
    {
        $kelompokKeahlian = [
            [
                'name' => 'Kelompok Keahlian Perencanaan Wilayah',
                'description' => 'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang perencanaan wilayah, termasuk perencanaan tata ruang, pengembangan wilayah, dan manajemen sumber daya alam.',
                'bidang' => [
                    'Perencanaan Tata Ruang',
                    'Pengembangan Wilayah',
                    'Manajemen Sumber Daya Alam'
                ],
                'user_id' => 1
            ],
            [
                'name' => 'Kelompok Keahlian Perencanaan Kota',
                'description' => 'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang perencanaan kota, termasuk perencanaan transportasi, perumahan, dan infrastruktur perkotaan.',
                'bidang' => [
                    'Perencanaan Transportasi',
                    'Perencanaan Perumahan',
                    'Perencanaan Infrastruktur Perkotaan'
                ],
                'user_id' => 1
            ],
            [
                'name' => 'Kelompok Keahlian Lingkungan',
                'description' => 'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang lingkungan, termasuk pengelolaan lingkungan, mitigasi bencana, dan adaptasi perubahan iklim.',
                'bidang' => [
                    'Pengelolaan Lingkungan',
                    'Mitigasi Bencana',
                    'Adaptasi Perubahan Iklim'
                ],
                'user_id' => 1
            ]
        ];

        foreach ($kelompokKeahlian as $data) {
            KelompokKeahlian::create($data);
        }
    }
}
