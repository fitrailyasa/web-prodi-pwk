<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FormLayananController extends Controller
{
    public function index()
    {



        $layanans = Layanan::all();

        $mappingDocuments = $layanans->map(function ($layanan) {
            return [
                'id' => $layanan->id,
                'name' => $layanan->name,
                'link' => $layanan->linkType === 'file' ? asset('storage/' . $layanan->file) : $layanan->link ?? 'https://itera.ac.id/',
                'linkType' => $layanan->linkType ?? 'url',
                'type' => $layanan->type ?? "Surat",
            ];
        });
        // dd($mappingDocuments);


        return Inertia::render('Kemahasiswaan/FormLayanan', [
            'title' => 'Form Layanan Kemahasiswaan',
            'description' => 'Berikut adalah form layanan yang dapat diakses oleh mahasiswa',
            'documents' => $mappingDocuments,
            // 'documents' => [],
        ]);
    }
}
