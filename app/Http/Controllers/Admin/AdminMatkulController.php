<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MatkulImport;
use App\Exports\MatkulExport;
use App\Http\Requests\MatkulRequest;

class AdminMatkulController extends Controller
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
            $matkuls = Matkul::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $matkuls = Matkul::withTrashed()->paginate($validPerPage);
        }

        $counter = ($matkuls->currentPage() - 1) * $matkuls->perPage() + 1;

        return view("admin.matkul.index", compact('matkuls', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new MatkulImport, $file);
        return back()->with('alert', 'Berhasil Import Data Matkul!');
    }

    public function export()
    {
        return Excel::download(new MatkulExport, 'Data Matkul.xlsx');
    }

    public function store(MatkulRequest $request)
    {
        $matkul = Matkul::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Matkul!');
    }

    public function update(MatkulRequest $request, $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Matkul!');
    }

    public function destroy($id)
    {
        Matkul::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Matkul!');
    }

    public function destroyAll()
    {
        Matkul::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Matkul!');
    }

    public function restore($id)
    {
        Matkul::withTrashed()->findOrFail($id)->restore();
        return back()->with('alert', 'Berhasil Restore Matkul!');
    }

    public function restoreAll()
    {
        Matkul::onlyTrashed()->restore();
        return back()->with('alert', 'Berhasil Restore Semua Matkul!');
    }
}
