<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\KelompokKeahlian;
use Inertia\Inertia;

class KelompokKeahlianController extends Controller
{
    public function index()
    {
        $kelompokKeahlian = KelompokKeahlian::all();

        return Inertia::render('Profile/KelompokKeahlian', [
            'kelompokKeahlian' => $kelompokKeahlian
        ]);
    }
}
