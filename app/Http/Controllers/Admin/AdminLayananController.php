<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use App\Http\Requests\LayananRequest;
use Illuminate\Support\Facades\Storage;

class AdminLayananController extends Controller
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
            $layanans = Layanan::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $layanans = Layanan::paginate($validPerPage);
        }

        $counter = ($layanans->currentPage() - 1) * $layanans->perPage() + 1;

        return view("admin.layanan.index", compact('layanans', 'counter', 'search', 'perPage'));
    }

    public function create()
    {
        return view("admin.layanan.create");
    }

    public function store(LayananRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $validatedData['user_id'] = auth()->id();

            // Upload file
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/layanan', $filename);
                $validatedData['file'] = str_replace('public/', '', $path);
            }

            Layanan::create($validatedData);
            return back()->with('alert', 'Berhasil Tambah Data layanan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menambah data: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view("admin.layanan.edit", compact('layanan'));
    }

    public function update(LayananRequest $request, $id)
    {
            $layanan = Layanan::findOrFail($id);
            $validatedData = $request->validated();

            // Upload file
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada
                if ($layanan->file && Storage::exists('public/' . $layanan->file)) {
                    Storage::delete('public/' . $layanan->file);
                }

                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/layanan', $filename);
                $validatedData['file'] = str_replace('public/', '', $path);
            }

            $layanan->update($validatedData);
            return back()->with('alert', 'Berhasil Edit Data layanan!');
    }

    public function destroy($id)
    {
        try {
            $layanan = Layanan::findOrFail($id);

            if ($layanan->file && Storage::exists('public/' . $layanan->file)) {
                Storage::delete('public/' . $layanan->file);
            }

            $layanan->delete();
            return back()->with('alert', 'Berhasil Hapus Data layanan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function destroyAll()
    {
            $layanans = Layanan::all();

            // Hapus semua file
            foreach ($layanans as $layanan) {
                if ($layanan->file && Storage::exists('public/' . $layanan->file)) {
                    Storage::delete($layanan->file);
                }
            }

            Layanan::query()->delete();
            return back()->with('alert', 'Berhasil Hapus Semua layanan!');
    }
}
