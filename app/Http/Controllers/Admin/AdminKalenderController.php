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

    public function update(kalenderRequest $request, $id)
    {
        $kalender = Kalender::first($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $kalender->user_id;

        // upload file
        if ($request->hasFile('file')) {
            $validatedData['file'] = $request->file('file')->store('file');
        }

        $kalender->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data kalender!');
    }
}
