<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function getVisitors()
    {
        $visitors = Visitor::selectRaw('DATE(created_at) as date, count(*) as count')
            ->groupBy('date')
            ->get();

        return response()->json([
            'visitors' => $visitors
        ], 200);
    }
}
