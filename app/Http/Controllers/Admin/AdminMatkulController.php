<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MatkulImport;
use App\Exports\MatkulExport;
use App\Http\Requests\MatkulRequest;
use Carbon\Carbon;

Carbon::setLocale('id');

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

        $days = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
        $lectures = User::where('role', 'dosen')->get();

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
        if ($search) {
            $matkuls = Matkul::where('name', 'like', "%{$search}%")
                ->orderByRaw($dayOrder)
                ->paginate($validPerPage);
        } else {
            $matkuls = Matkul::orderByRaw($dayOrder)
                ->paginate($validPerPage);
        }

        $counter = ($matkuls->currentPage() - 1) * $matkuls->perPage() + 1;

        return view("admin.matkul.index", compact('matkuls', 'days', 'lectures', 'counter', 'search', 'perPage'));
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
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Matkul::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Matkul!');
    }

    public function update(MatkulRequest $request, $id)
    {
        $Matkul = Matkul::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $Matkul->user_id;

        $Matkul->update($validatedData);
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
}
