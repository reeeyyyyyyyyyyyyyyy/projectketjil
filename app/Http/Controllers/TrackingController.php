<?php

namespace App\Http\Controllers;

use App\Models\TrackingHistory;
use Illuminate\Http\Request;
use App\Models\Document;

class TrackingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:documents,id',
            'process_step_id' => 'required|exists:process_steps,id',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $history = TrackingHistory::create([
            'document_id' => $request->document_id,
            'process_step_id' => $request->process_step_id,
            'status' => $request->status,
            'notes' => $request->notes,
            'officer_id' => auth()->id(),
            'started_at' => now(),
        ]);

        return response()->json($history, 201);
    }

    public function complete($id)
    {
        $history = TrackingHistory::findOrFail($id);
        $history->completed_at = now();
        $history->status = 'Selesai';
        $history->save();

        return response()->json($history);
    }

    public function historyByDocument($documentId)
    {
        $histories = TrackingHistory::with('processStep', 'officer')->where('document_id', $documentId)->get();
        return response()->json($histories);
    }
    public function index(Request $request)
    {
        $trackingNumber = $request->query('tracking_number');
        $document = null;

        if ($trackingNumber) {
            // Cek apakah user sudah login
            if (auth()->check()) {
                $document = Document::where('tracking_number', $trackingNumber)
                    ->where('user_id', auth()->id())
                    ->with(['documentType', 'trackingHistories'])
                    ->first();
            }
            // Cek session guest
            elseif (session('guest_document') && session('guest_document')->tracking_number === $trackingNumber) {
                $document = session('guest_document');
            }
            // Atau cari secara publik
            else {
                $document = Document::where('tracking_number', $trackingNumber)
                    ->with(['documentType', 'trackingHistories'])
                    ->first();
            }

            if (!$document) {
                return redirect()->route('tracking.status')->withErrors([
                    'tracking_number' => 'Dokumen tidak ditemukan'
                ]);
            }
        }

        return view('tracking-status', compact('document'));
    }
}
