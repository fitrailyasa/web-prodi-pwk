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

    public function index(Request $request)
    {
        $beritaData = Berita::with(['tag'])
            ->where('status', 'publish')
            ->orderBy('event_date', 'desc')
            ->limit(10)
            ->get();

        $tagsData = Tag::all();
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

        // Menerima query dari frontend
        $search = $request->query('search');
        $tag = $request->query('tags');

        // Cari tag_id berdasarkan slug
        $tagId = null;
        if ($tag) {
            $tagModel = Tag::where('slug', $tag)->first();
            if ($tagModel) {
                $tagId = $tagModel->id;
            }
        }

        // Ambil berita lainnya berdasarkan filter
        $otherNewsData = Berita::with(['tag'])
            ->when(
                $search,
                fn($q) => $q->where('name', 'like', '%' . $search . '%')
            )
            ->when(
                $tagId,
                fn($q) => $q->where('tag_id', $tagId)
            )
            // ->where('status', 'publish') // Pastikan hanya berita yang dipublish yang diambil
            ->orderBy('event_date', 'desc')
            ->paginate(12);

        $mapOtherNewsData = $otherNewsData->map(function ($item) {
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

        // dd($otherNewsData);

        $pagienatedData = [
            'current_page' => $otherNewsData->currentPage(),
            'data' => $mapOtherNewsData,
            'from' => $otherNewsData->firstItem(),
            'last_page' => $otherNewsData->lastPage(),
            'path' => $otherNewsData->path(),
            'per_page' => $otherNewsData->perPage(),
            'to' => $otherNewsData->lastItem(),
            'total' => $otherNewsData->total(),
        ];

        return Inertia::render('Berita/Index', [
            'berita' => $berita,
            'tags' => $tags->map(function ($item) {
                return [
                    'label' => $item->name,
                    'key' => $item->slug,
                ];
            }),
            'otherNews' => $pagienatedData,
            'search' => $search ?? '',
            'tag' => $tag ?? '',
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
