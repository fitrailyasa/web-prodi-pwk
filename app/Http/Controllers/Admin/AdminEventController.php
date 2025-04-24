<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EventImport;
use App\Exports\EventExport;
use App\Http\Requests\EventRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

Carbon::setLocale('id');

class AdminEventController extends Controller
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

        $tags = Tag::all();

        if ($search) {
            $events = Event::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $events = Event::paginate($validPerPage);
        }

        $counter = ($events->currentPage() - 1) * $events->perPage() + 1;

        return view("admin.event.index", compact('events', 'tags', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new EventImport, $file);
        return back()->with('alert', 'Berhasil Import Data Event!');
    }

    public function export()
    {
        return Excel::download(new EventExport, 'Data Event.xlsx');
    }

    public function store(EventRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        if ($request->hasFile('img')) {
            $validatedData['img'] = $request->file('img')->store('event', 'public');
        }

        Event::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah Data Event!');
    }

    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $validatedData = $request->validated();

        $validatedData['user_id'] = $event->user_id;

        if ($request->hasFile('img')) {
            if ($event->img && Storage::exists('public/' . $event->img)) {
                Storage::delete('public/' . $event->img);
            }

            $validatedData['img'] = $request->file('img')->store('event', 'public');
        }

        $event->update($validatedData);
        return back()->with('alert', 'Berhasil Edit Data Event!');
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Event!');
    }

    public function destroyAll()
    {
        Event::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Event!');
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
