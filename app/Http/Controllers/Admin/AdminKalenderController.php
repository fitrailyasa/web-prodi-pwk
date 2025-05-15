<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kalender;
use Illuminate\Http\Request;
use App\Http\Requests\KalenderRequest;
use Illuminate\Support\Facades\Storage;

class AdminKalenderController extends Controller
{
    public function index()
    {
        $kalender = Kalender::first();
        return view('admin.kalender.index', compact('kalender'));
    }

    public function update(KalenderRequest $request, $id)
    {
        $kalender = Kalender::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = auth()->id();

        // upload file
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($kalender->file) {
                Storage::delete($kalender->file);
            }
            $validatedData['file'] = $request->file('file')->store('kalender', 'public');
        }

        $kalender->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data kalender!');
    }
}
