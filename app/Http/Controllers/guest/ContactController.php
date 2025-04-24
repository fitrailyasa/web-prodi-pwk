<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $tentang = \App\Models\Tentang::first();

        return Inertia::render('Contact', [
            'title' => 'Kontak',
            'tentang' => $tentang
        ]);
    }
}
