<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $tentang = \App\Models\Tentang::first();

        return Inertia::render('Contact', [
            'title' => __('Kontak'),
            'tentang' => $tentang
        ]);
    }
}
