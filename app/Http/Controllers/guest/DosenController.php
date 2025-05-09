<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jadwal;
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
                }
            ])
            ->firstOrFail();

        // Get courses from jadwals
        $courses = Jadwal::where('lecture', $id)
            ->with('matkul')
            ->get()
            ->groupBy('matkul_id')
            ->map(function ($jadwals) {
                $firstJadwal = $jadwals->first();
                return [
                    'id' => $firstJadwal->matkul->id,
                    'name' => $firstJadwal->matkul->name,
                    'code' => $firstJadwal->matkul->code,
                    'semester' => $firstJadwal->matkul->semester,
                    'credits' => $firstJadwal->matkul->credits,
                    'jadwals' => $jadwals->map(function ($jadwal) {
                        return [
                            'class' => $jadwal->class,
                            'room' => $jadwal->room,
                            'day' => $jadwal->day,
                            'start_time' => $jadwal->start_time,
                            'end_time' => $jadwal->end_time
                        ];
                    })
                ];
            })
            ->values();

        $dosen->courses = $courses;

        return Inertia::render('Profile/DosenAndStaf/DosenAndStafDetail', [
            'dosen' => $dosen
        ]);
    }
}
