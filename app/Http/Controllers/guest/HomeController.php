<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $News  = Berita::where('status', 'publish')->orderBy('views', 'desc')
            ->with('tag')
            ->limit(5)->get();

        $tentangData = Tentang::first();

        $evenData = Event::where('status', 'publish')->orderBy('event_date', 'desc')->limit(10)->get();

        $popularNews = $News->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'slug' => $item->slug,
                'tag' => $item->tag->name ?? '',
                'image' => $item->img,
                'see' => $item->views,
                'date' => $item->publish_date,
                'description' => $item->desc,
            ];
        });

        $aboutPWK = [
            'deskripsi' => $tentangData->description ?? 'Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Natus sapiente eaque deleniti
                                reiciendis sunt explicabo consectetur quae sequi
                                itaque maiores? Impedit aspernatur eum animi
                                provident! Perferendis eveniet adipisci sequi
                                quisquam?',
            'visi' => $tentangData->vision ?? 'Visi belum tersedia',
            'misi' => array_map(function ($mission) {
                return ['title' => $mission];
            }, $tentangData->mission ?? [])
        ];

        $events = $evenData->map(function ($item) {
            return [
                'title' => $item->name,
                'dateStart' => $item->event_date,
                'date' => $item->event_date,
                'dateEnd' => $item->event_date_end ?? null,
                'description' => $item->desc,
            ];
        });

        return Inertia::render('Home', [
            'popularNews' => $popularNews,
            'statistic' => [
                'total_tendik' => $tentangData->total_teaching_staff ?? 0,
                'total_mahasiswa' => $tentangData->total_student ?? 0,
                'total_dosen' => $tentangData->total_lecture ?? 0,
            ],
            'aboutPWK' => $aboutPWK,
            'event' => $events,
        ]);
    }
}
