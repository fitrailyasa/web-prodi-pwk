<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaData = Berita::with(['tag'])
            ->where('status', 'publish')
            ->orderBy('event_date', 'desc')
            ->get();


        if ($beritaData->isEmpty()) {
            return Inertia::render('Berita/Index', [
                'berita' => null,
                'message' => __('Data berita belum tersedia')
            ]);
        }

        $berita = $beritaData->map(function ($item) {
            return [
                'id' => $item->id,
                'judul' => $item->name,
                'slug' => $item->slug,
                'tag' => $item->tag->name ?? '',
                'image' => $item->img,
                'see' => $item->views,
                'date' => $item->event_date,
                'description' => $item->desc,
            ];
        });

        // $berita = [
        //     [
        //         'id' => 1,
        //         'judul' => 'Berita 1',
        //         'isi' => 'Isi Berita 1'
        //     ],
        //     [
        //         'id' => 2,
        //         'judul' => 'Berita 2',
        //         'isi' => 'Isi Berita 2'
        //     ],
        //     [
        //         'id' => 3,
        //         'judul' => 'Berita 3',
        //         'isi' => 'Isi Berita 3'
        //     ],
        //     [
        //         'id' => 4,
        //         'judul' => 'Berita 4',
        //         'isi' => 'Isi Berita 4'
        //     ],
        //     [
        //         'id' => 5,
        //         'judul' => 'Berita 5',
        //         'isi' => 'Isi Berita 5'
        //     ],
        // ];
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
