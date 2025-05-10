<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class AdminUserController extends Controller
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

        $roles = [
            [
                'id' => 'admin',
                'name' => 'Admin',
            ],
            [
                'id' => 'dosen',
                'name' => 'Dosen',
            ],
            [
                'id' => 'user',
                'name' => 'User',
            ]
        ];

        if ($search) {
            $users = User::where('name', 'like', "%{$search}%")
                ->paginate($validPerPage);
        } else {
            $users = User::paginate($validPerPage);
        }

        $counter = ($users->currentPage() - 1) * $users->perPage() + 1;

        return view("admin.user.index", compact('users', 'roles', 'counter', 'search', 'perPage'));
    }

    public function store(UserStoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['email_verified_at'] = now();
        $validatedData['status'] = $validatedData['status'] ?? 'tidak aktif';

        User::create($validatedData);
        return back()->with('alert', 'Berhasil Tambah User!');
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        // Prevent updating super admin role
        if ($user->email === 'super@admin.com') {
            unset($validatedData['role']);
        }

        $user->update($validatedData);
        return back()->with('alert', 'Berhasil Edit User!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting super admin
        if ($user->email === 'super@admin.com') {
            return back()->with('error', 'Tidak dapat menghapus Super Administrator!');
        }

        $user->delete();
        return back()->with('alert', 'Berhasil Hapus User!');
    }
}
