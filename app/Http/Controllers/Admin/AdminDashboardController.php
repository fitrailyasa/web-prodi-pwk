<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Era;
use App\Models\link;
use App\Models\Category;
use App\Models\Data;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $links = link::all()->count();
        $eras = Era::all()->count();
        $categories = Category::all()->count();
        $datas = Data::all()->count();

        return view('admin.dashboard', compact('users', 'links', 'eras', 'categories', 'datas'));
    }
}
