<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ModulImport;
use App\Exports\ModulExport;
use App\Http\Requests\ModulRequest;

class AdminModulController extends Controller
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
            $moduls = Modul::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $moduls = Modul::paginate($validPerPage);
        }

        $counter = ($moduls->currentPage() - 1) * $moduls->perPage() + 1;

        return view("admin.modul.index", compact('moduls', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new ModulImport, $file);
        return back()->with('alert', 'Berhasil Import Data Modul!');
    }

    public function export()
    {
        return Excel::download(new ModulExport, 'Data Modul.xlsx');
    }

    public function store(ModulRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        // upload img 
        
        Modul::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Modul!');
    }

    public function update(ModulRequest $request, $id)
    {
        $Modul = Modul::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $Modul->user_id;

        $Modul->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Modul!');
    }

    public function destroy($id)
    {
        Modul::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Modul!');
    }

    public function destroyAll()
    {
        Modul::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Modul!');
    }
}
