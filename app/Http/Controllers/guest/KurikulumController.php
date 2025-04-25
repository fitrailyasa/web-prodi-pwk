<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class KurikulumController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::with('moduls')->get();
        $jadwals = Jadwal::all();

        return Inertia::render('Akademik/Kurikulum', [
            'title' => __('Kurikulum Program Studi'),
            'matkuls' => $matkuls,
            'jadwals' => $jadwals
        ]);
    }
}
