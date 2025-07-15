<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class GuestController extends Controller
{
    public function dashboard()
    {
        $user = FacadesAuth::user();
        $documents = Document::where('user_id', $user->id)
            ->with('documentType')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $pendingCount = Document::where('user_id', $user->id)
            ->where('status', '!=', 'Selesai')
            ->count();

        return view('guest.dashboard', compact('documents', 'pendingCount'));
    }

    public function documents()
    {
        $user = FacadesAuth::user();
        $documents = Document::where('user_id', $user->id)
            ->with('documentType')
            ->paginate(10);

        return view('guest.documents', compact('documents'));
    }

    public function documentDetail($id)
    {
        $document = Document::with(['documentType', 'trackingHistories'])
            ->where('user_id', FacadesAuth::id())
            ->findOrFail($id);

        return view('guest.document-detail', compact('document'));
    }
}
