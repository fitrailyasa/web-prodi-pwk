<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = [
            [
                'id' => 1,
                'judul' => 'Berita 1',
                'isi' => 'Isi Berita 1'
            ],
            [
                'id' => 2,
                'judul' => 'Berita 2',
                'isi' => 'Isi Berita 2'
            ],
            [
                'id' => 3,
                'judul' => 'Berita 3',
                'isi' => 'Isi Berita 3'
            ],
            [
                'id' => 4,
                'judul' => 'Berita 4',
                'isi' => 'Isi Berita 4'
            ],
            [
                'id' => 5,
                'judul' => 'Berita 5',
                'isi' => 'Isi Berita 5'
            ],
        ];
        return Inertia::render('Berita/Index', [
            'berita' => $berita
        ]);
    }

    public function show($id)
    {
        $berita = [
            [
                'id' => 1,
                'judul' => 'Berita 1',
                'isi' => 'Isi Berita 1'
            ],
            [
                'id' => 2,
                'judul' => 'Berita 2',
                'isi' => 'Isi Berita 2'
            ],
            [
                'id' => 3,
                'judul' => 'Berita 3',
                'isi' => 'Isi Berita 3'
            ],
            [
                'id' => 4,
                'judul' => 'Berita 4',
                'isi' => 'Isi Berita 4'
            ],
            [
                'id' => 5,
                'judul' => 'Berita 5',
                'isi' => 'Isi Berita 5'
            ],
        ];
        $data = collect($berita)->where('id', $id)->first();
        return Inertia::render('Berita/Show', [
            'berita' => $data
        ]);
    }
}


