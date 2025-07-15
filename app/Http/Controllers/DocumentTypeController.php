<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    public function index()
    {
        $types = DocumentType::all();
        return response()->json($types);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:document_types,name',
            'processing_days' => 'required|integer|min:1',
            'requirements' => 'required|array',
        ]);

        $type = DocumentType::create([
            'name' => $request->name,
            'processing_days' => $request->processing_days,
            'requirements' => $request->requirements,
        ]);

        return response()->json($type, 201);
    }

    public function show($id)
    {
        $type = DocumentType::findOrFail($id);
        return response()->json($type);
    }

    public function update(Request $request, $id)
    {
        $type = DocumentType::findOrFail($id);
        $type->update($request->only(['name', 'processing_days', 'requirements']));
        return response()->json($type);
    }

    public function destroy($id)
    {
        $type = DocumentType::findOrFail($id);
        $type->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
