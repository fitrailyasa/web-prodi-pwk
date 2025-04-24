<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modul;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ModulImport;
use App\Exports\ModulExport;
use App\Http\Requests\ModulRequest;
use Illuminate\Support\Facades\Storage;

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

        $query = Modul::with('matkul');

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('matkul', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                });
        }

        $moduls = $query->paginate($validPerPage);
        $counter = ($moduls->currentPage() - 1) * $moduls->perPage() + 1;
        $matkuls = Matkul::all();

        return view("admin.modul.index", compact('moduls', 'counter', 'search', 'perPage', 'matkuls'));
    }

    public function create()
    {
        $matkuls = Matkul::all();
        return view("admin.modul.create", compact('matkuls'));
    }

    public function store(ModulRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->id();

            // Upload gambar
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/modul', $filename);
                $validatedData['img'] = str_replace('public/', '', $path);
            }

            // Upload file
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/modul', $filename);
                $validatedData['file'] = str_replace('public/', '', $path);
            }

            Modul::create($validatedData);
            return back()->with('alert', 'Berhasil Tambah Data Modul!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambah data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $modul = Modul::findOrFail($id);
        $matkuls = Matkul::all();
        return view("admin.modul.edit", compact('modul', 'matkuls'));
    }

    public function update(ModulRequest $request, $id)
    {
        try {
            $modul = Modul::findOrFail($id);
            $validatedData = $request->validated();

            // Upload gambar
            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($modul->img && Storage::exists('public/' . $modul->img)) {
                    Storage::delete('public/' . $modul->img);
                }

                $file = $request->file('img');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/modul', $filename);
                $validatedData['img'] = str_replace('public/', '', $path);
            }

            // Upload file
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($modul->file && Storage::exists('public/' . $modul->file)) {
                    Storage::delete('public/' . $modul->file);
                }

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/modul', $filename);
                $validatedData['file'] = str_replace('public/', '', $path);
            }

            $modul->update($validatedData);
            return back()->with('alert', 'Berhasil Edit Data Modul!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengedit data: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $modul = Modul::findOrFail($id);

            // Hapus file dan gambar
            if ($modul->img && Storage::exists('public/' . $modul->img)) {
                Storage::delete('public/' . $modul->img);
            }
            if ($modul->file && Storage::exists('public/' . $modul->file)) {
                Storage::delete('public/' . $modul->file);
            }

            $modul->delete();
            return back()->with('alert', 'Berhasil Hapus Data Modul!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function destroyAll()
    {
        try {
            $moduls = Modul::all();

            // Hapus semua file dan gambar
            foreach ($moduls as $modul) {
                if ($modul->img && Storage::exists('public/' . $modul->img)) {
                    Storage::delete('public/' . $modul->img);
                }
                if ($modul->file && Storage::exists('public/' . $modul->file)) {
                    Storage::delete($modul->file);
                }
            }

            Modul::query()->delete();
            return back()->with('alert', 'Berhasil Hapus Semua Modul!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus semua data: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,xls',
            ]);

            $file = $request->file('file');
            Excel::import(new ModulImport, $file);
            return back()->with('alert', 'Berhasil Import Data Modul!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal import data: ' . $e->getMessage());
        }
    }

    public function export()
    {
        try {
            return Excel::download(new ModulExport, 'Data Modul.xlsx');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal export data: ' . $e->getMessage());
        }
    }
}
