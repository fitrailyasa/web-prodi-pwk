<?php

namespace Tests\Feature;

use App\Models\KelompokKeahlian;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelompokKEahlianControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_kelompok_keahlian_from_database_and_passes_to_inertia_component()
    {
        // Arrange - Buat 3 data kelompok keahlian
        // Arrange - Buat data kelompok keahlian sesuai dengan struktur yang diberikan
        $user = \App\Models\User::factory()->create(['id' => 1]);
        $kelompokKeahlian = [
            [
                'name' => 'Kelompok Keahlian Perencanaan Wilayah',
                'description' => 'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang perencanaan wilayah, termasuk perencanaan tata ruang, pengembangan wilayah, dan manajemen sumber daya alam.',
                'bidang' => [
                    'Perencanaan Tata Ruang',
                    'Pengembangan Wilayah',
                    'Manajemen Sumber Daya Alam'
                ],
                'user_id' => $user->id
            ],
            [
                'name' => 'Kelompok Keahlian Perencanaan Kota',
                'description' => 'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang perencanaan kota, termasuk perencanaan transportasi, perumahan, dan infrastruktur perkotaan.',
                'bidang' => [
                    'Perencanaan Transportasi',
                    'Perencanaan Perumahan',
                    'Perencanaan Infrastruktur Perkotaan'
                ],
                'user_id' => $user->id
            ],
            [
                'name' => 'Kelompok Keahlian Lingkungan',
                'description' => 'Kelompok keahlian ini fokus pada pengembangan ilmu pengetahuan dan teknologi di bidang lingkungan, termasuk pengelolaan lingkungan, mitigasi bencana, dan adaptasi perubahan iklim.',
                'bidang' => [
                    'Pengelolaan Lingkungan',
                    'Mitigasi Bencana',
                    'Adaptasi Perubahan Iklim'
                ],
                'user_id' => $user->id
            ]
        ];

        // Insert the data into the database
        foreach ($kelompokKeahlian as $data) {
            KelompokKeahlian::create($data);
        }

        // Act - Panggil route
        $response = $this->get(route('profile.kelompok-keahlian'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Profile/KelompokKeahlian')
                ->where('title', __('Kelompok Keahlian'))
                ->where(
                    'kelompokKeahlian',
                    fn($kelompok) =>
                    count($kelompok) === 3 &&
                        $kelompok[0]['name'] === $kelompokKeahlian[0]['name'] &&
                        $kelompok[1]['name'] === $kelompokKeahlian[1]['name'] &&
                        $kelompok[2]['name'] === $kelompokKeahlian[2]['name']
                )
        );
    }

    //** @test */
    public function it_displays_kelompok_keahlian_page_with_no_data()
    {
        // Act - Panggil route
        $response = $this->get(route('profile.kelompok-keahlian'));

        // Assert
        $response->assertStatus(200);
        $response->assertInertia(
            fn($page) =>
            $page->component('Profile/KelompokKeahlian')
                ->where('title', __('Kelompok Keahlian'))
                ->where('kelompokKeahlian', [])
        );
    }
}
