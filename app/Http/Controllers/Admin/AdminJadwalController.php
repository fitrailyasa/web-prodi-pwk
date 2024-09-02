<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\JadwalImport;
use App\Exports\JadwalExport;
use App\Http\Requests\JadwalRequest;

class AdminJadwalController extends Controller
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
            $jadwals = Jadwal::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $jadwals = Jadwal::paginate($validPerPage);
        }

        $counter = ($jadwals->currentPage() - 1) * $jadwals->perPage() + 1;

        return view("admin.jadwal.index", compact('jadwals', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new JadwalImport, $file);
        return back()->with('alert', 'Berhasil Import Data Jadwal!');
    }

    public function export()
    {
        return Excel::download(new JadwalExport, 'Data Jadwal.xlsx');
    }

    public function store(JadwalRequest $request)
    {
        $jadwal = Jadwal::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Jadwal!');
    }

    public function update(JadwalRequest $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Jadwal!');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Jadwal!');
    }

    public function destroyAll()
    {
        Jadwal::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Jadwal!');
    }
}
