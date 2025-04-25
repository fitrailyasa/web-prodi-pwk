<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mbkm;
use Illuminate\Http\Request;
use App\Http\Requests\MbkmRequest;

class AdminMbkmController extends Controller
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
            $mbkms = Mbkm::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $mbkms = Mbkm::paginate($validPerPage);
        }

        $counter = ($mbkms->currentPage() - 1) * $mbkms->perPage() + 1;

        return view("admin.mbkm.index", compact('mbkms', 'counter', 'search', 'perPage'));
    }

    public function store(MbkmRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        // Convert benefits string to array
        if (isset($validatedData['benefits'])) {
            $benefits = array_filter(explode("\n", $validatedData['benefits']), 'trim');
            $validatedData['benefits'] = $benefits;
        }

        Mbkm::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Mbkm!');
    }

    public function update(MbkmRequest $request, $id)
    {
        $Mbkm = Mbkm::findOrFail($id);
        $validatedData = $request->validated();
        $validatedData['user_id'] = $Mbkm->user_id;

        // Convert benefits string to array
        if (isset($validatedData['benefits'])) {
            $benefits = array_filter(explode("\n", $validatedData['benefits']), 'trim');
            $validatedData['benefits'] = $benefits;
        }

        $Mbkm->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Mbkm!');
    }

    public function destroy($id)
    {
        Mbkm::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Mbkm!');
    }

    public function destroyAll()
    {
        Mbkm::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Mbkm!');
    }
}
