<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Inertia\Inertia;

class NavbarController extends Controller
{
    public function index()
    {
        return Inertia::render('NavBar', [
            'profileLinks' => Link::byCategory('profile')->get(),
            'akademikLinks' => Link::byCategory('akademik')->get(),
            'fasilitasLinks' => Link::byCategory('fasilitas')->get(),
        ]);
    }
}
