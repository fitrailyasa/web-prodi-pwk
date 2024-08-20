<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Franchise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FranchiseImport;
use App\Exports\FranchiseExport;
use App\Http\Requests\FranchiseRequest;

class AdminFranchiseController extends Controller
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
            $franchises = Franchise::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $franchises = Franchise::withTrashed()->paginate($validPerPage);
        }

        $counter = ($franchises->currentPage() - 1) * $franchises->perPage() + 1;

        return view("admin.franchise.index", compact('franchises', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new FranchiseImport, $file);

        return back()->with('alert', 'Berhasil Import Data Franchise!');
    }

    public function export()
    {
        return Excel::download(new FranchiseExport, 'Data Franchise.xlsx');
    }

    public function store(FranchiseRequest $request)
    {
        $franchise = Franchise::create($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data Franchise!');
    }

    public function update(FranchiseRequest $request, $id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->update($request->validated());

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $franchise->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $franchise->img = $file_name;
            $franchise->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data Franchise!');
    }

    public function destroy($id)
    {
        Franchise::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Franchise!');
    }

    public function destroyAll()
    {
        Franchise::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Franchise!');
    }

    public function restore($id)
    {
        Franchise::withTrashed()->findOrFail($id)->restore();
        return back()->with('alert', 'Berhasil Restore Franchise!');
    }

    public function restoreAll()
    {
        Franchise::onlyTrashed()->restore();
        return back()->with('alert', 'Berhasil Restore Semua Franchise!');
    }
}
