<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DosenController extends Controller
{
    public function index()
    {
        $koordinator = User::where('role', 'dosen')
            ->where('position', 'koordinator')
            ->with(['dosenProfile'])
            ->first();

        $dosen = User::where('role', 'dosen')
            ->where('position', '!=', 'koordinator')
            ->with(['dosenProfile'])
            ->get();

        $staff = User::where('role', 'staff')
            ->with(['dosenProfile'])
            ->get();

        return Inertia::render('Profile/DosenAndStaf/DosenAndStaft', [
            'koordinator' => $koordinator,
            'employee' => $dosen,
            'staff' => $staff
        ]);
    }

    public function show($id)
    {
        $dosen = User::where('role', 'dosen')
            ->where('id', $id)
            ->with([
                'dosenProfile',
                'publications' => function ($query) {
                    $query->orderBy('year', 'desc');
                },
                'courses' => function ($query) {
                    $query->orderBy('semester', 'desc');
                }
            ])
            ->firstOrFail();

        return Inertia::render('Profile/DosenAndStaf/DosenAndStafDetail', [
            'dosen' => $dosen
        ]);
    }
}
