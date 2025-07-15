<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $documentTypes = DocumentType::paginate(10);
        return view('admin.document-types.index', compact('documentTypes'));
    }

    public function create()
    {
        return view('admin.document-types.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'processing_days' => 'required|integer',
            'requirements' => 'required|string',
        ]);

        $requirements = array_filter(explode("\n", $request->requirements));

        DocumentType::create([
            'name' => $request->name,
            'processing_days' => $request->processing_days,
            'requirements' => json_encode($requirements),
        ]);

        return redirect()->route('admin.document-types.index')->with('success', 'Jenis dokumen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $documentType = DocumentType::findOrFail($id);
        return view('admin.document-types.form', compact('documentType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'processing_days' => 'required|integer',
            'requirements' => 'required|string',
        ]);

        $documentType = DocumentType::findOrFail($id);
        $requirements = array_filter(explode("\n", $request->requirements));

        $documentType->update([
            'name' => $request->name,
            'processing_days' => $request->processing_days,
            'requirements' => json_encode($requirements),
        ]);

        return redirect()->route('admin.document-types.index')->with('success', 'Jenis dokumen berhasil diperbarui');
    }

    public function destroy($id)
    {
        $documentType = DocumentType::findOrFail($id);
        $documentType->delete();

        return redirect()->route('admin.document-types.index')->with('success', 'Jenis dokumen berhasil dihapus');
    }
}
