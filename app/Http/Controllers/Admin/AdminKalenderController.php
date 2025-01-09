<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kalender;
use Illuminate\Http\Request;
use App\Http\Requests\KalenderRequest;

class AdminKalenderController extends Controller
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
            $Kalenders = Kalender::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $Kalenders = Kalender::paginate($validPerPage);
        }

        $counter = ($Kalenders->currentPage() - 1) * $Kalenders->perPage() + 1;

        return view("admin.Kalender.index", compact('Kalenders', 'counter', 'search', 'perPage'));
    }

    public function store(KalenderRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        Kalender::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Kalender!');
    }

    public function update(KalenderRequest $request, $id)
    {
        $Kalender = Kalender::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $Kalender->user_id;

        $Kalender->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Kalender!');
    }

    public function destroy($id)
    {
        Kalender::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Kalender!');
    }

    public function destroyAll()
    {
        Kalender::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Kalender!');
    }
}
