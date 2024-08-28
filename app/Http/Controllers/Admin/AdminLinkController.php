<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LinkImport;
use App\Exports\LinkExport;
use App\Http\Requests\LinkRequest;

class AdminLinkController extends Controller
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
            $links = Link::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $links = Link::withTrashed()->paginate($validPerPage);
        }

        $counter = ($links->currentPage() - 1) * $links->perPage() + 1;

        return view("admin.link.index", compact('links', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new LinkImport, $file);
        return back()->with('alert', 'Berhasil Import Data Link!');
    }

    public function export()
    {
        return Excel::download(new LinkExport, 'Data Link.xlsx');
    }

    public function store(LinkRequest $request)
    {
        $link = Link::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Link!');
    }

    public function update(LinkRequest $request, $id)
    {
        $link = Link::findOrFail($id);
        $link->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Link!');
    }

    public function destroy($id)
    {
        Link::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Link!');
    }

    public function destroyAll()
    {
        Link::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Link!');
    }

    public function restore($id)
    {
        Link::withTrashed()->findOrFail($id)->restore();
        return back()->with('alert', 'Berhasil Restore Link!');
    }

    public function restoreAll()
    {
        Link::onlyTrashed()->restore();
        return back()->with('alert', 'Berhasil Restore Semua Link!');
    }
}
