<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function getVisitors()
    {
        $visitors = Visitor::all();
        return response()->json([
            'visitors' => $visitors
        ], 200);
    }
}
