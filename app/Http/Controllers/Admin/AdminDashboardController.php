<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Link;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $links = Link::all()->count();

        return view('admin.dashboard', compact('users', 'links'));
    }
}
