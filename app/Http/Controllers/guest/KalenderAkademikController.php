<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Kalender;
use App\Models\Event;
use Inertia\Inertia;

class KalenderAkademikController extends Controller
{
    public function index()
    {
        $kalender = Kalender::first();

        // hanya even yang tahun ini yang ditampilkan dan di urutkan berdsarkan tanggal
        $events = Event::whereYear('event_date', date('Y'))
            ->orderBy('event_date', 'asc')
            ->get();

        return Inertia::render('Akademik/KalenderAkademik', [
            'title' => __('Kalender Akademik'),
            'year' => date('Y'),
            'kalender' => $kalender ? [
                'file' => $kalender->file ? asset('storage/' . $kalender->file) : null,
            ] : null,
            'events' => $events,
        ]);
    }
}
