<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Inertia\Inertia;

class SejarahController extends Controller
{
    public function index()
    {
        $timelineEvents = Sejarah::orderBy('year', 'asc')->get();

        return Inertia::render('Profile/Sejarah', [
            'title' => __('Sejarah'),
            'timelineEvents' => $timelineEvents
        ]);
    }
}
