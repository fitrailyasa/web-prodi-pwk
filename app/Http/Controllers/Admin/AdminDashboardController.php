<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Link;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Modul;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total counts
        $totalUsers = User::count();
        $totalLinks = Link::count();
        $totalBerita = Berita::count();
        $totalEvents = Event::count();
        $totalJadwal = Jadwal::count();
        $totalMatkul = Matkul::count();
        $totalModul = Modul::count();

        // Recent activity - get latest 5 items with title/name and created_at
        $recentBerita = Berita::select('id', 'name as judul', 'created_at')
            ->latest()
            ->take(5)
            ->get();

        $recentEvents = Event::select('id', 'name as judul', 'created_at')
            ->latest()
            ->take(5)
            ->get();

        $recentJadwal = Jadwal::select('id', 'created_at')
            ->latest()
            ->take(5)
            ->get();

        // Monthly statistics for current year
        $currentYear = Carbon::now()->year;
        $monthlyBerita = $this->getMonthlyData(Berita::class, $currentYear);
        $monthlyEvents = $this->getMonthlyData(Event::class, $currentYear);
        $monthlyJadwal = $this->getMonthlyData(Jadwal::class, $currentYear);

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalLinks',
            'totalBerita',
            'totalEvents',
            'totalJadwal',
            'totalMatkul',
            'totalModul',
            'recentBerita',
            'recentEvents',
            'recentJadwal',
            'monthlyBerita',
            'monthlyEvents',
            'monthlyJadwal'
        ));
    }

    private function getMonthlyData($model, $year)
    {
        $data = [];
        for ($month = 1; $month <= 12; $month++) {
            $count = $model::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();
            $data[] = $count;
        }
        return $data;
    }
}
