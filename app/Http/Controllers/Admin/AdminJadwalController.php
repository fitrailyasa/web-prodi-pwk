<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\User;
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

        $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        $lectures = User::where('role', 'dosen')->get();
        $matkuls = Matkul::all();

        // Define custom ordering for days
        $dayOrder = "CASE 
            WHEN day = 'Senin' THEN 1 
            WHEN day = 'Selasa' THEN 2 
            WHEN day = 'Rabu' THEN 3 
            WHEN day = 'Kamis' THEN 4 
            WHEN day = 'Jumat' THEN 5 
            WHEN day = 'Sabtu' THEN 6 
            WHEN day = 'Minggu' THEN 7 
            ELSE 8 END";

        // Query with search and ordering
        $query = Jadwal::query();

        $query->where('user_id', auth()->id());

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $jadwals = $query->orderByRaw($dayOrder)->paginate($validPerPage);
        $counter = ($jadwals->currentPage() - 1) * $jadwals->perPage() + 1;

        return view("admin.jadwal.index", compact('jadwals', 'matkuls', 'days', 'lectures', 'counter', 'search', 'perPage'));
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
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Jadwal::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Jadwal!');
    }

    public function update(JadwalRequest $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        $jadwal->update($validatedData);
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
