<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function chartVisitor(Request $request)
    {
        Visitor::setDynamicConnection();
        // Set the dynamic connection
        $startOfWeek = Carbon::now()->startOfWeek(); // Senin
        $endOfWeek = Carbon::now()->endOfWeek();     // Minggu

        $visitors = Visitor::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        $grouped = $visitors->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->locale('id')->isoFormat('dddd'); // nama hari
        });

        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        $data = collect($days)->map(function ($day) use ($grouped) {
            $visits = $grouped[$day] ?? collect();

            return [
                'day' => $day,
                'total' => $visits->count(),
            ];
        });

        return response()->json($data);
    }

    public function store(Request $request)
    {
        // Set the dynamic connection
        Visitor::setDynamicConnection();

        // Validate the request data
        $request->validate([
            'ip_address' => 'required|ip',
            'user_agent' => 'required|string',
        ]);

        // Create a new visitor record
        $visitor = Visitor::create([
            'ip_address' => $request->ip_address,
            'user_agent' => $request->user_agent,
        ]);

        return response()->json($visitor, 201);
    }

    public function count()
    {
        // Set the dynamic connection
        Visitor::setDynamicConnection();

        // Count the total number of visitors
        $totalVisitors = Visitor::count();

        return response()->json(['total_visitors' => $totalVisitors]);
    }
}
