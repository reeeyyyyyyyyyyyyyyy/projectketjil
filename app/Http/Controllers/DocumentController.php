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
        $documents = Document::with('type')->latest()->paginate(10);
        return view('admin.documents.index', compact('documents'));
    }

    public function create()
    {
        $documentTypes = DocumentType::orderBy('name')->get();
        return view('admin.documents.form', compact('documentTypes'));
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

        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diajukan.');
    }

    public function show($id)
    {
        $document = Document::with('type', 'trackingHistories')->findOrFail($id);
        return view('admin.documents.show', compact('document'));
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);
        $documentTypes = DocumentType::orderBy('name')->get();

        return view('admin.documents.form', compact('document', 'documentTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'document_type_id' => 'required|exists:document_types,id',
            'applicant_name' => 'required',
            'applicant_phone' => 'required',
            'applicant_email' => 'required|email',
            'business_address' => 'required',
            'status' => 'required|string',
        ]);

        $document = Document::findOrFail($id);
        $document->update($request->all());

        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('admin.documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
