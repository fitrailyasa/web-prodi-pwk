<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AlumniController extends Controller
{
    public function index(Request $request)
    {
        $alumniData = Alumni::paginate(2);
        $returnAlumniData = $alumniData->map(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'tahun_masuk' => $item->class_year,
                'tahun_lulus' => $item->graduation_year,
                'image' => $item->img,
                'email' => 'johndoe@example.com',
                'nomor_telepon' => '08123456789',
                'judul_penelitian' => 'Pemanfaatan AI dalam Analisis Data',
                'posisi_pekerjaan' => $item->work,
                'nama_perusahaan' => $item->company,
                'bidang_industri' => 'Teknologi',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'instagram' => 'https://instagram.com',
            ];
        });

        $pagienatedData = [
            'current_page' => $alumniData->currentPage(),
            'data' => $returnAlumniData,
            'from' => $alumniData->firstItem(),
            'last_page' => $alumniData->lastPage(),
            'path' => $alumniData->path(),
            'per_page' => $alumniData->perPage(),
            'to' => $alumniData->lastItem(),
            'total' => $alumniData->total(),
        ];


        return Inertia::render('Profile/Alumni', [
            'alumni' => $pagienatedData,
        ]);
    }
}
