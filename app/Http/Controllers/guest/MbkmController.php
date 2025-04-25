<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MbkmController extends Controller
{
    public function index()
    {
        return inertia('Akademik/Mbkm');
    }
}
