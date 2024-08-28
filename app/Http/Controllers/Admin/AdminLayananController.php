<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LayananImport;
use App\Exports\LayananExport;
use App\Http\Requests\LayananRequest;

class AdminLayananController extends Controller
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
            $layanans = Layanan::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $layanans = Layanan::withTrashed()->paginate($validPerPage);
        }

        $counter = ($layanans->currentPage() - 1) * $layanans->perPage() + 1;

        return view("admin.Layanan.index", compact('Layanans', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new LayananImport, $file);
        return back()->with('alert', 'Berhasil Import Data Layanan!');
    }

    public function export()
    {
        return Excel::download(new LayananExport, 'Data Layanan.xlsx');
    }

    public function store(LayananRequest $request)
    {
        $Layanan = Layanan::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Layanan!');
    }

    public function update(LayananRequest $request, $id)
    {
        $Layanan = Layanan::findOrFail($id);
        $Layanan->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Layanan!');
    }

    public function destroy($id)
    {
        Layanan::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Layanan!');
    }

    public function destroyAll()
    {
        Layanan::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Layanan!');
    }

    public function restore($id)
    {
        Layanan::withTrashed()->findOrFail($id)->restore();
        return back()->with('alert', 'Berhasil Restore Layanan!');
    }

    public function restoreAll()
    {
        Layanan::onlyTrashed()->restore();
        return back()->with('alert', 'Berhasil Restore Semua Layanan!');
    }
}
