<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisiMisiController extends Controller
{
    public function index()
    {
        $tentangData = Tentang::first();

        if (!$tentangData) {
            return Inertia::render('Profile/VisiMisi', [
                'title' => __('Visi & Misi'),
                'visi' => null,
                'misi' => null,
                'tujuan' => null,
                'message' => __('Data visi misi belum tersedia')
            ]);
        }

        return Inertia::render('Profile/VisiMisi', [
            'title' => __('Visi & Misi'),
            'visi' => $tentangData->vision,
            'misi' => $tentangData->mission,
            'tujuan' => $tentangData->goals
        ]);
    }
}
