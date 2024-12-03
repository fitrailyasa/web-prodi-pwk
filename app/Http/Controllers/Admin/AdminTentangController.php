<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TentangImport;
use App\Exports\TentangExport;
use App\Http\Requests\TentangRequest;

class AdminTentangController extends Controller
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
            $tentangs = Tentang::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $tentangs = Tentang::paginate($validPerPage);
        }

        $counter = ($tentangs->currentPage() - 1) * $tentangs->perPage() + 1;

        return view("admin.tentang.index", compact('tentangs', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new TentangImport, $file);
        return back()->with('alert', 'Berhasil Import Data Tentang!');
    }

    public function export()
    {
        return Excel::download(new TentangExport, 'Data Tentang.xlsx');
    }

    public function store(TentangRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Tentang::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Tentang!');
    }

    public function update(TentangRequest $request, $id)
    {
        $Tentang = Tentang::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $Tentang->user_id;

        $Tentang->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Tentang!');
    }

    public function destroy($id)
    {
        Tentang::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Tentang!');
    }

    public function destroyAll()
    {
        Tentang::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Tentang!');
    }
}
