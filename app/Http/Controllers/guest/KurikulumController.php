<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use App\Models\Jadwal;
use Inertia\Inertia;

class KurikulumController extends Controller
{
    public function index()
    {
        $matkuls = Matkul::with('moduls')->get();
        $jadwals = Jadwal::with('dosen')->get();

        return Inertia::render('Akademik/Kurikulum', [
            'title' => __('Kurikulum Program Studi'),
            'matkuls' => $matkuls,
            'jadwals' => $jadwals->map(function ($item) {
                return [
                    'id' => $item->id,
                    'matkul_id' => $item->matkul_id,
                    'class' => $item->class,
                    'room' => $item->room,
                    'lecture' => $item->dosen->name ?? '',
                    'day' => $item->day,
                    'start_time' => $item->start_time,
                    'end_time' => $item->end_time,
                ];
            }),
            'semesters' => 'ganjil', // ganjil/genap
            'tahun_ajaran' => '2023/2024', // tahun ajaran
        ]);
    }
}
