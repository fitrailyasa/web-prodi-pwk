<?php

namespace App\Http\Middleware;

use App\Models\Link;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'flash' => [
                'status' => fn() => $request->session()->get('status')
            ],
            'auth' => Inertia::share(
                'user',
                fn(Request $request) => $request->user()
                    ? $request->user()->only('id', 'name', 'email')
                    : null
            ),
            'nav_link' => Link::get()->map(function ($link) {
                return [
                    'id' => $link->id,
                    'title' => $link->name,
                    'description' => $link->desc,
                    'href' => $link->link,
                    'category' => $link->category,
                ];
            }),
            'tentang' => Tentang::first() ?? [
                'name' => 'Program Studi Perencanaan Wilayah dan Kota',
                'address' => 'Jalan Terusan Ryacudu, Way Huwi, Kec. Jati Agung, Kabupaten Lampung Selatan, Lampung 35365',
                'phone' => '(0721) 8030188',
                'email' => 'pwk@itera.ac.id',
                'instagram_url' => 'https://instagram.com/pwkitera',
                'youtube_url' => 'https://youtube.com/@pwkitera',
                'tiktok_url' => 'https://tiktok.com/@pwkitera'
            ],
            'storage' => [
                'link' => Storage::url(''),
            ],
        ]);
    }
}
