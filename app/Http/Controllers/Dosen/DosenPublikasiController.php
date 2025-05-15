<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use App\Http\Requests\PublikasiRequest;
use Illuminate\Support\Facades\Auth;

class DosenPublikasiController extends Controller
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
            $publikasis = Publikasi::where('user_id', Auth::id())->orderBy('year', 'desc')->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $publikasis = Publikasi::where('user_id', Auth::id())->orderBy('year', 'desc')->paginate($validPerPage);
        }

        $counter = ($publikasis->currentPage() - 1) * $publikasis->perPage() + 1;

        return view("dosen.publikasi.index", compact('publikasis', 'counter', 'search', 'perPage'));
    }

    public function store(PublikasiRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Publikasi::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Publikasi!');
    }

    public function update(PublikasiRequest $request, $id)
    {
        $publikasi = Publikasi::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $publikasi->user_id;

        $publikasi->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Publikasi!');
    }

    public function destroy($id)
    {
        Publikasi::findOrFail($id)->forceDelete();
        return back()->with('alert', 'Berhasil Hapus Data Publikasi!');
    }
}
