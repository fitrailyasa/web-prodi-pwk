<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BeritaController extends Controller
{
    public function index()
    {
        $beritaData = Berita::with(['tag'])
            ->where('status', 'publish')
            ->orderBy('event_date', 'desc')
            ->limit(10)
            ->get();

        $tagsData = Tag::with('berita')->get();
        $berita = [];
        $tags = [];

        if (!$beritaData->isEmpty()) {
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
            // return Inertia::render('Berita/Index', [
            //     'berita' => [],
            // 'tags' =>
            //     'message' => __('Data berita belum tersedia')
            // ]);
        }

        if (!$tagsData->isEmpty()) {
            $tags = $tagsData;
        }




        return Inertia::render('Berita/Index', [
            'berita' => $berita,
            'tags' => $tags
        ]);
    }

    public function show($slug)
    {


        $beritaData = Berita::with('tag')->where('slug', $slug)->get();
        return Inertia::render('Berita/Show', [
            'berita' => $beritaData
        ]);
    }
}
