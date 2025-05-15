<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matkuls')->insert([
            // Semester 1
            ['name' => 'Matematika I', 'code' => 'MA1103R', 'credits' => 4, 'semester' => 1, 'user_id' => 2],
            ['name' => 'Fisika Dasar I', 'code' => 'FI1103R', 'credits' => 4, 'semester' => 1, 'user_id' => 2],
            ['name' => 'Kimia Dasar I', 'code' => 'KI1103R', 'credits' => 3, 'semester' => 1, 'user_id' => 2],
            ['name' => 'Konsep Pengembangan Ilmu Pengetahuan', 'code' => 'KU1101R', 'credits' => 2, 'semester' => 1, 'user_id' => 2],
            ['name' => 'Olahraga', 'code' => 'KU1001R', 'credits' => 2, 'semester' => 1, 'user_id' => 2],
            ['name' => 'Tata Tulis Karya Ilmiah', 'code' => 'KU1011R', 'credits' => 2, 'semester' => 1, 'user_id' => 2],
            ['name' => 'Pengantar Teknologi Infrastruktur dan Kewilayahan', 'code' => 'KU1103R', 'credits' => 2, 'semester' => 1, 'user_id' => 2],
            // Semester 2
            ['name' => 'Matematika II', 'code' => 'MA1203R', 'credits' => 4, 'semester' => 2, 'user_id' => 2],
            ['name' => 'Fisika Dasar II', 'code' => 'FI1203R', 'credits' => 4, 'semester' => 2, 'user_id' => 2],
            ['name' => 'Kimia Dasar II', 'code' => 'KI1203R', 'credits' => 3, 'semester' => 2, 'user_id' => 2],
            ['name' => 'Sistem Alam Semesta', 'code' => 'KU1201R', 'credits' => 2, 'semester' => 2, 'user_id' => 2],
            ['name' => 'Pemahaman Teks Akademik', 'code' => 'KU1021R', 'credits' => 2, 'semester' => 2, 'user_id' => 2],
            ['name' => 'Pengantar Teknologi Informasi', 'code' => 'KU1072R', 'credits' => 2, 'semester' => 2, 'user_id' => 2],
            // Semester 3
            ['name' => 'Pengantar Geologi Tata Lingkungan', 'code' => 'GL21CDR', 'credits' => 2, 'semester' => 3, 'user_id' => 2],
            ['name' => 'Lingkungan dan Sumber Daya Alam', 'code' => 'PL2101R', 'credits' => 3, 'semester' => 3, 'user_id' => 2],
            ['name' => 'Pola Lokasi dan Struktur Ruang', 'code' => 'PL2102R', 'credits' => 3, 'semester' => 3, 'user_id' => 2],
            ['name' => 'Pengantar Ekonomika', 'code' => 'PL2151R', 'credits' => 2, 'semester' => 3, 'user_id' => 2],
            ['name' => 'Pengantar Data Spasial', 'code' => 'PL2103R', 'credits' => 3, 'semester' => 3, 'user_id' => 2],
            ['name' => 'Aspek Kependudukan dalam Perencanaan', 'code' => 'PL2104R', 'credits' => 2, 'semester' => 3, 'user_id' => 2],
            ['name' => 'Metode Analisis Perencanaan I', 'code' => 'PL2105R', 'credits' => 3, 'semester' => 3, 'user_id' => 2],
            // Semester 4
            ['name' => 'Ekonomi Wilayah & Kota', 'code' => 'PL2251R', 'credits' => 3, 'semester' => 4, 'user_id' => 2],
            ['name' => 'Tata Guna Lahan', 'code' => 'PL2201R', 'credits' => 2, 'semester' => 4, 'user_id' => 2],
            ['name' => 'Pengantar Infrastruktur Wilayah dan Kota', 'code' => 'PL2231R', 'credits' => 2, 'semester' => 4, 'user_id' => 2],
            ['name' => 'Sistem Perumahan', 'code' => 'PL2211R', 'credits' => 2, 'semester' => 4, 'user_id' => 2],
            ['name' => 'Metode Analisis Perencanaan II', 'code' => 'PL2202R', 'credits' => 4, 'semester' => 4, 'user_id' => 2],
            ['name' => 'Studio Proses Perencanaan', 'code' => 'PL2209R', 'credits' => 3, 'semester' => 4, 'user_id' => 2],
            ['name' => 'Hukum Perencanaan', 'code' => 'PL2241R', 'credits' => 2, 'semester' => 4, 'user_id' => 2],
            // Semester 5
            ['name' => 'Perencanaan Kota', 'code' => 'PL3111R', 'credits' => 3, 'semester' => 5, 'user_id' => 2],
            ['name' => 'Aspek Sosial dan Pengembangan Komunitas', 'code' => 'PL3101R', 'credits' => 3, 'semester' => 5, 'user_id' => 2],
            ['name' => 'Perencanaan Infrastruktur Wilayah dan Kota', 'code' => 'PL3131R', 'credits' => 3, 'semester' => 5, 'user_id' => 2],
            ['name' => 'Studio Perencanaan Tapak Perumahan', 'code' => 'PL3119R', 'credits' => 3, 'semester' => 5, 'user_id' => 2],
            ['name' => 'Pembiayaan Pembangunan', 'code' => 'PL3141R', 'credits' => 2, 'semester' => 5, 'user_id' => 2],
            ['name' => 'Pengembangan Lahan (Pilihan 1)', 'code' => 'PL3011R', 'credits' => 2, 'semester' => 5, 'user_id' => 2],
            ['name' => 'Pengantar Kepariwisataan (Pilihan 2)', 'code' => 'PL3001R', 'credits' => 2, 'semester' => 5, 'user_id' => 2],
            // Semester 6
            ['name' => 'Perencanaan Wilayah', 'code' => 'PL3221R', 'credits' => 3, 'semester' => 6, 'user_id' => 2],
            ['name' => 'Perencanaan Perdesaan', 'code' => 'PL3222R', 'credits' => 2, 'semester' => 6, 'user_id' => 2],
            ['name' => 'Studio Perencanaan Kota', 'code' => 'PL3219R', 'credits' => 4, 'semester' => 6, 'user_id' => 2],
            ['name' => 'Studio Infrastruktur Wilayah dan Kota', 'code' => 'PL3239R', 'credits' => 3, 'semester' => 6, 'user_id' => 2],
            ['name' => 'Manajemen & Administrasi Pembangunan', 'code' => 'PL3241R', 'credits' => 3, 'semester' => 6, 'user_id' => 2],
            ['name' => 'Analisis Kebutuhan Pergerakan (Pilihan Luar Prodi)', 'code' => 'SI4141R', 'credits' => 3, 'semester' => 6, 'user_id' => 2],
            // Semester 7
            ['name' => 'Studio Perencanaan Wilayah', 'code' => 'PL4129R', 'credits' => 4, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Perancangan Kota', 'code' => 'PL4112R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Kerja Praktek', 'code' => 'PL4190R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Metode Penelitian', 'code' => 'PL4101R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Teknik Evaluasi Perencanaan', 'code' => 'PL4102R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Aspek Kebencanaan dalam Perencanaan (Pilihan 3)', 'code' => 'PL4001R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Ekonomika Infrastruktur & Transportasi (Pilihan 4)', 'code' => 'PL4002R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            ['name' => 'Peremajaan Kota dan Perencanaan Kota Baru (Pilihan 5)', 'code' => 'PL4003R', 'credits' => 2, 'semester' => 7, 'user_id' => 2],
            // Semester 8
            ['name' => 'Teori Perencanaan', 'code' => 'PL4201R', 'credits' => 2, 'semester' => 8, 'user_id' => 2],
            ['name' => 'Pengendalian Pembangunan', 'code' => 'PL4202R', 'credits' => 2, 'semester' => 8, 'user_id' => 2],
            ['name' => 'Tugas Akhir', 'code' => 'PL4290R', 'credits' => 6, 'semester' => 8, 'user_id' => 2],
            ['name' => 'Pancasila & Kewarganegaraan', 'code' => 'KU2071R', 'credits' => 2, 'semester' => 8, 'user_id' => 2],
            ['name' => 'Agama & Etika', 'code' => 'KU 206R', 'credits' => 2, 'semester' => 8, 'user_id' => 2],
            ['name' => 'Sistem Informasi Perencanaan', 'code' => 'PL4103R', 'credits' => 2, 'semester' => 8, 'user_id' => 2],
            ['name' => 'Pilihan', 'code' => 'Pilihan', 'credits' => 2, 'semester' => 8, 'user_id' => 2],
        ]);
    }
}
