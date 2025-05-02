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

        $visitorData =

            // Get the visitor data
            $visitor = \App\Models\Visitor::all();

        return response()->json($visitor);
    }
}
