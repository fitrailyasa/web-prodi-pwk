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
                'visi' => null,
                'misi' => null,
                'tujuan' => null,
                'message' => 'Data visi misi belum tersedia'
            ]);
        }

        return Inertia::render('Profile/VisiMisi', [
            'visi' => $tentangData->vision,
            'misi' => $tentangData->mission,
            'tujuan' => $tentangData->goals
        ]);
    }
}
