<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function countVisitor(Request $request)
    {
        // Set the dynamic connection
        // hitung visistor setiap hari nya



        // Get the visitor data
        $visitor = \App\Models\Visitor::all();

        return response()->json($visitor);
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
