<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Mbkm;
use Inertia\Inertia;

class MbkmController extends Controller
{
    public function index()
    {
        $mbkmPrograms = Mbkm::all();

        return Inertia::render('Akademik/Mbkm', [
            'mbkmPrograms' => $mbkmPrograms
        ]);
    }
}
