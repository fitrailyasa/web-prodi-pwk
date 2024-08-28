<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KategoriImport;
use App\Exports\KategoriExport;
use App\Http\Requests\KategoriRequest;

class AdminKategoriController extends Controller
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
            $kategoris = Kategori::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $kategoris = Kategori::withTrashed()->paginate($validPerPage);
        }

        $counter = ($kategoris->currentPage() - 1) * $kategoris->perPage() + 1;

        return view("admin.kategori.index", compact('kategoris', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new KategoriImport, $file);
        return back()->with('alert', 'Berhasil Import Data Kategori!');
    }

    public function export()
    {
        return Excel::download(new KategoriExport, 'Data Kategori.xlsx');
    }

    public function store(KategoriRequest $request)
    {
        $kategori = Kategori::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Kategori!');
    }

    public function update(KategoriRequest $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Kategori!');
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Kategori!');
    }

    public function destroyAll()
    {
        Kategori::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Kategori!');
    }

    public function restore($id)
    {
        Kategori::withTrashed()->findOrFail($id)->restore();
        return back()->with('alert', 'Berhasil Restore Kategori!');
    }

    public function restoreAll()
    {
        Kategori::onlyTrashed()->restore();
        return back()->with('alert', 'Berhasil Restore Semua Kategori!');
    }
}
