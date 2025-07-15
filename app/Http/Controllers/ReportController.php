<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return response()->json(Report::orderBy('report_date', 'desc')->get());
    }

    public function today()
    {
        $today = Report::whereDate('report_date', today())->first();
        return response()->json($today);
    }
}
