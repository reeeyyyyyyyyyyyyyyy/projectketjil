<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\TrackingHistory;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class StaffController extends Controller
{
    public function dashboard()
    {
        $user = FacadesAuth::user();
        $documents = Document::where('officer_id', $user->id)
            ->with('documentType')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $pendingCount = Document::where('officer_id', $user->id)
            ->where('status', '!=', 'Selesai')
            ->count();

        return view('staff.dashboard', compact('documents', 'pendingCount'));
    }

    public function documents()
    {
        $user = FacadesAuth::user();
        $documents = Document::where('officer_id', $user->id)
            ->with('documentType')
            ->paginate(10);

        return view('staff.documents', compact('documents'));
    }

    public function documentDetail($id)
    {
        $document = Document::with(['documentType', 'trackingHistories'])
            ->findOrFail($id);

        return view('staff.document-detail', compact('document'));
    }

    public function tracking()
    {
        return view('staff.tracking');
    }
}
