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
        }

        if (!$tagsData->isEmpty()) {
            $tags = $tagsData;
        }

        return Inertia::render('Berita/Index', [
            'berita' => $berita,
            'tags' => $tags->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'slug' => $item->slug,
                    'berita' => $item->berita->map(function ($berita) {
                        return [
                            'id' => $berita->id,
                            'judul' => $berita->name,
                            'slug' => $berita->slug,
                            'tag' => $berita->tag->name ?? '',
                            'image' => $berita->img,
                            'see' => $berita->views,
                            'date' => $berita->event_date,
                            'description' => $berita->desc,
                        ];
                    }),
                ];
            })
        ]);
    }

    public function show($slug)
    {


        $beritaData = Berita::with('tag')->where('slug', $slug)->first();

        $otherNewsData = Berita::where('slug', '!=', $slug)
            ->where('status', 'publish')
            ->inRandomOrder()
            ->limit(5)
            ->get();
        return Inertia::render('Berita/Show', [
            'berita' => $beritaData,
            'otherNews' => $otherNewsData->map(function ($item) {
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
            })
        ]);
    }
}
