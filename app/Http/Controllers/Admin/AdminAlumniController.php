<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumniImport;
use App\Exports\AlumniExport;
use App\Http\Requests\AlumniRequest;

class AdminAlumniController extends Controller
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
            $alumnis = Alumni::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $alumnis = Alumni::paginate($validPerPage);
        }

        $counter = ($alumnis->currentPage() - 1) * $alumnis->perPage() + 1;

        return view("admin.alumni.index", compact('alumnis', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new AlumniImport, $file);
        return back()->with('alert', 'Berhasil Import Data Alumni!');
    }

    public function export()
    {
        return Excel::download(new AlumniExport, 'Data Alumni.xlsx');
    }

    public function store(AlumniRequest $request)
    {
        $alumni = Alumni::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Alumni!');
    }

    public function update(AlumniRequest $request, $id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Alumni!');
    }

    public function destroy($id)
    {
        Alumni::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Alumni!');
    }

    public function destroyAll()
    {
        Alumni::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Alumni!');
    }
}
