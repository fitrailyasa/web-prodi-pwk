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
        // Get coordinator (dosen with position 'koordinator')
        $koordinator = User::where('role', 'dosen')
            ->where('position', 'koordinator')
            ->with(['dosenProfile'])
            ->first();

        // Get all other dosen
        $dosen = User::where('role', 'dosen')
            ->where('position', '!=', 'koordinator')
            ->with(['dosenProfile'])
            ->get();

        // Get staff
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
