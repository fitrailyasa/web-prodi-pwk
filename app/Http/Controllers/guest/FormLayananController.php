<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormLayananController extends Controller
{
    public function index()
    {

        $constanDocuments = [
            [
                'id' => 1,
                'name' => 'Formulir layanan Pengantar Kerja Praktik',
                'link' => '/assets/img/defaultImage.png',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 2,
                'name' => 'Surat Pengantar Kerja Praktik',
                'link' => 'http://if.itera.ac.id/',
                'linkType' => 'url',
                'type' => 'Surat'
            ],
            [
                'id' => 3,
                'name' => 'Surat Keterangan 144 SKS',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 4,
                'name' => 'Surat Tugas Kerja Praktik',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Surat'
            ],
            [
                'id' => 5,
                'name' => 'Formulir Layanan Pengantar Izin Penelitian',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 6,
                'name' => 'Surat Permohonan Izin Penelitian',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Surat'
            ],
            [
                'id' => 7,
                'name' => 'Layanan Permohonan Dispensasi Mahasiswa',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 8,
                'name' => 'Surat Pernyataan Penghapusan Mata Kuliah',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 9,
                'name' => 'Formulir Legalisir Ijazah',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 10,
                'name' => 'Formulir Translate Ijazah',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 11,
                'name' => 'Surat Keterangan Aktif Kuliah',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 12,
                'name' => 'Formulir Pengajuan Cuti Akademik',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Formulir'
            ],
            [
                'id' => 13,
                'name' => 'Surat Rekomendasi Beasiswa',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 14,
                'name' => 'Formulir Pengajuan Skripsi',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 15,
                'name' => 'Surat Keterangan Lulus',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Surat'
            ],
            [
                'id' => 16,
                'name' => 'Layanan Konsultasi Akademik',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Formulir'
            ],
            [
                'id' => 17,
                'name' => 'Formulir Pendaftaran Wisuda',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 18,
                'name' => 'Surat Rekomendasi Magang',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 19,
                'name' => 'Layanan Bimbingan Karir',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Formulir'
            ],
            [
                'id' => 20,
                'name' => 'Formulir Pengajuan Dana Kegiatan',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 21,
                'name' => 'Surat Izin Penelitian Lanjutan',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 22,
                'name' => 'Formulir Pengajuan Seminar',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Formulir'
            ],
            [
                'id' => 23,
                'name' => 'Layanan Konseling Mahasiswa',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Formulir'
            ],
            [
                'id' => 24,
                'name' => 'Surat Rekomendasi Pertukaran Pelajar',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Surat'
            ],
            [
                'id' => 25,
                'name' => 'Formulir Pengajuan Prestasi',
                'link' => 'Download',
                'linkType' => 'file',
                'type' => 'Formulir'
            ],
            [
                'id' => 26,
                'name' => 'Surat Keterangan Tidak Menerima Beasiswa',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Surat'
            ],
            [
                'id' => 27,
                'name' => 'Layanan Pengaduan Akademik',
                'link' => 'Buka',
                'linkType' => 'url',
                'type' => 'Formulir'
            ]
        ];

        // interface Document {
        //     id: number
        //     name: string
        //     link: string
        //     linkType: 'file' | 'url'
        //     type: 'Formulir' | 'Surat'
        // }


        return Inertia::render('Kemahasiswaan/FormLayanan', [
            'title' => 'Form Layanan Kemahasiswaan',
            'description' => 'Berikut adalah form layanan yang dapat diakses oleh mahasiswa',
            'documents' => $constanDocuments,
            // 'documents' => [],
        ]);
    }
}
