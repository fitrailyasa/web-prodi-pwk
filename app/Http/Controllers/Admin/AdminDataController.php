<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataImport;
use App\Exports\DataExport;
use App\Http\Requests\DataRequest;

class AdminDataController extends Controller
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
        $categories = Category::all();

        if ($search) {
            $datas = Data::withTrashed()
                ->where('name', 'like', "%{$search}%")
                ->orWhere('img', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $datas = Data::withTrashed()->paginate($validPerPage);
        }

        $counter = ($datas->currentPage() - 1) * $datas->perPage() + 1;

        return view("admin.data.index", compact('datas', 'categories', 'tags', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new DataImport, $file);

        return back()->with('alert', 'Berhasil Import Data!');
    }

    public function export()
    {
        return Excel::download(new DataExport, 'Data.xlsx');
    }

    public function store(DataRequest $request)
    {
        $data = Data::create($request->validated());
        $data->tags()->attach($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Tambah Data!');
    }

    public function update(DataRequest $request, $id)
    {
        $data = Data::findOrFail($id)->update($request->validated());
        $data->tags()->sync($request->tags);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $file_name = $data->name . '_' . $data->category->name . '_' . time() . '.' . $img->getClientOriginalExtension();
            $data->img = $file_name;
            $data->update();
            $img->move('../public/assets/img/', $file_name);
        }

        return back()->with('alert', 'Berhasil Edit Data!');
    }

    public function destroy($id)
    {
        Data::findOrFail($id)->delete();

        return back()->with('alert', 'Berhasil Hapus Data!');
    }

    public function destroyAll()
    {
        Data::query()->delete();

        return back()->with('alert', 'Berhasil Hapus Semua Data!');
    }

    public function restore($id)
    {
        Data::withTrashed()->findOrFail($id)->restore();

        return back()->with('alert', 'Berhasil Restore Data!');
    }

    public function restoreAll()
    {
        Data::onlyTrashed()->restore();

        return back()->with('alert', 'Berhasil Restore Semua Data!');
    }
}
