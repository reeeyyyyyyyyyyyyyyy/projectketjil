<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\DocumentType;
use App\Models\Document;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $documentTypes = DocumentType::orderBy('name')->get();
        $documents = Document::with('documentType')->latest()->paginate(10);

        $query = Report::with('officer', 'document')->latest();

        if ($request->filled('document_type')) {
            $query->whereHas('document', function ($q) use ($request) {
                $q->where('document_type_id', $request->document_type);
            });
        }

        $reports = $query->paginate(10);

        return view('admin.reports.index', compact('reports', 'documentTypes', 'documents'));
    }


    public function today()
    {
        $today = Report::whereDate('report_date', today())->first();
        return response()->json($today);
    }
}
