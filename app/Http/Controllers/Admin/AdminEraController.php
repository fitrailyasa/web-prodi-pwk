<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Era;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EraImport;
use App\Exports\EraExport;
use App\Http\Requests\EraRequest;

class AdminEraController extends Controller
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
            $eras = Era::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $eras = Era::withTrashed()->paginate($validPerPage);
        }

        $counter = ($eras->currentPage() - 1) * $eras->perPage() + 1;

        return view("admin.era.index", compact('eras', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new EraImport, $file);

        return back()->with('alert', 'Berhasil Import Data Era!');
    }

    public function export()
    {
        return Excel::download(new EraExport, 'Data Era.xlsx');
    }

    public function store(EraRequest $request)
    {
        $era = Era::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data Era!');
    }

    public function update(EraRequest $request, $id)
    {
        $era = Era::findOrFail($id);
        $era->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $era->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $era->img = $file_name;
            $era->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data Era!');
    }

    public function destroy($id)
    {
        Era::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Era!');
    }

    public function destroyAll()
    {
        Era::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Era!');
    }

    public function restore($id)
    {
        Era::withTrashed()->findOrFail($id)->restore();
        return back()->with('alert', 'Berhasil Restore Era!');
    }

    public function restoreAll()
    {
        Era::onlyTrashed()->restore();
        return back()->with('alert', 'Berhasil Restore Semua Era!');
    }
}
