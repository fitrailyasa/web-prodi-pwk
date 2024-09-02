<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StaffImport;
use App\Exports\StaffExport;
use App\Http\Requests\StaffRequest;

class AdminStaffController extends Controller
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
            $staffs = Staff::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $staffs = Staff::paginate($validPerPage);
        }

        $counter = ($staffs->currentPage() - 1) * $staffs->perPage() + 1;

        return view("admin.staff.index", compact('staffs', 'counter', 'search', 'perPage'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        Excel::import(new StaffImport, $file);
        return back()->with('alert', 'Berhasil Import Data Staff!');
    }

    public function export()
    {
        return Excel::download(new StaffExport, 'Data Staff.xlsx');
    }

    public function store(StaffRequest $request)
    {
        $staff = Staff::create($request->validated());
        return back()->with('alert', 'Berhasil Tambah Data Staff!');
    }

    public function update(StaffRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->validated());
        return back()->with('alert', 'Berhasil Edit Data Staff!');
    }

    public function destroy($id)
    {
        Staff::findOrFail($id)->delete();
        return back()->with('alert', 'Berhasil Hapus Data Staff!');
    }

    public function destroyAll()
    {
        Staff::query()->delete();
        return back()->with('alert', 'Berhasil Hapus Semua Staff!');
    }
}
