<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use App\Http\Requests\TentangRequest;
use Illuminate\Support\Facades\Storage;

class AdminTentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::first();
        return view('admin.tentang.index', compact('tentang'));
    }

    public function update(TentangRequest $request, $id)
    {
        $tentang = Tentang::first($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $tentang->user_id;

        $tentang->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Tentang!');
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('upload')->store('images', 'public');
        
        $url = Storage::url($path);

        return response()->json([
            'uploaded' => true,
            'url' => $url
        ]);
    }
}
