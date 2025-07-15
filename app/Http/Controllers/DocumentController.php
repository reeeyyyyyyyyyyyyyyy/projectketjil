<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('type', 'trackingHistories')->get();
        return response()->json($documents);
    }

    public function store(Request $request)
    {
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'applicant_name' => 'required',
            'applicant_phone' => 'required',
            'applicant_email' => 'required|email',
            'business_address' => 'required',
        ]);

        $trackingNumber = 'DPM-JT-' . date('Y') . '-' . strtoupper(Str::random(5));

        $document = Document::create([
            'tracking_number' => $trackingNumber,
            'document_type_id' => $request->document_type_id,
            'user_id' => auth()->id(),
            'applicant_name' => $request->applicant_name,
            'applicant_phone' => $request->applicant_phone,
            'applicant_email' => $request->applicant_email,
            'business_address' => $request->business_address,
            'status' => 'Diajukan',
            'submission_date' => now(),
        ]);

        return response()->json($document, 201);
    }

    public function show($id)
    {
        $document = Document::with('type', 'trackingHistories')->findOrFail($id);
        return response()->json($document);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $document = Document::findOrFail($id);
        $document->status = $request->status;
        $document->notes = $request->notes;
        $document->save();

        return response()->json($document);
    }
}
