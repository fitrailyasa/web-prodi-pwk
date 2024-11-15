<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BeritaImport;
use App\Exports\BeritaExport;
use App\Http\Requests\BeritaRequest;

class AdminBeritaController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
            'perPage' => 'nullable|integer|in:10,50,100',
        ]);

        $search = $request->input('search');
        $perPage = (int) $request->input('perPage', 10);

        $validPerPage = in_array($perPage, [10, 50, 100]) ? $perPage : 10;

        if ($search) {
            $beritas = Berita::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $beritas = Berita::paginate($validPerPage);
        }

        $counter = ($beritas->currentPage() - 1) * $beritas->perPage() + 1;

        return view("admin.berita.index", compact('beritas', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new BeritaImport, $file);
        return back()->with('alert', 'Berhasil Import Data Berita!');
    }

    public function export()
    {
        return Excel::download(new BeritaExport, 'Data Berita.xlsx');
    }

    public function store(BeritaRequest $request)
    {
        $berita = Berita::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Berita!');
    }

    public function update(BeritaRequest $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Berita!');
    }

    public function destroy($id)
    {
        Berita::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Berita!');
    }

    public function destroyAll()
    {
        Berita::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Berita!');
    }
}
