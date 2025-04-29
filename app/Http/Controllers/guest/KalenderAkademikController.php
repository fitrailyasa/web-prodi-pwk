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
        $events = Event::all();

        return Inertia::render('Akademik/KalenderAkademik', [
            'title' => __('Kalender Akademik'),
            'kalender' => $kalender ? [
                'file' => $kalender->file ? asset('storage/' . $kalender->file) : null,
            ] : null,
            'events' => $events,
        ]);
    }
}
