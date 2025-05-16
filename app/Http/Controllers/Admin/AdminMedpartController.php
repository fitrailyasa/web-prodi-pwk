<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medpart;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MedpartImport;
use App\Exports\MedpartExport;
use App\Http\Requests\MedpartRequest;
use Illuminate\Support\Facades\Storage;

class AdminMedpartController extends Controller
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
            $medparts = Medpart::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $medparts = Medpart::paginate($validPerPage);
        }

        $counter = ($medparts->currentPage() - 1) * $medparts->perPage() + 1;

        return view("admin.medpart.index", compact('medparts', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new MedpartImport, $file);
        return back()->with('alert', 'Berhasil Import Data Medpart!');
    }

    public function export()
    {
        return Excel::download(new MedpartExport, 'Data Medpart.xlsx');
    }

    public function store(MedpartRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('medpart', 'public');
        }

        Medpart::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Medpart!');
    }

    public function update(MedpartRequest $request, $id)
    {
        $medpart = Medpart::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('img')) {
            if ($medpart->img && Storage::exists('public/' . $medpart->img)) {
                Storage::delete('public/' . $medpart->img);
            }
            $validatedData['img'] = $request->file('img')->store('medpart', 'public');
        }

        $medpart->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Medpart!');
    }

    public function destroy($id)
    {
        Medpart::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Medpart!');
    }

    public function destroyAll()
    {
        Medpart::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Medpart!');
    }
}
