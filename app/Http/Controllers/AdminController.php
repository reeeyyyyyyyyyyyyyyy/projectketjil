<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_documents' => Document::count(),
            'pending_documents' => Document::where('status', 'Diajukan')->count(),
            'completed_documents' => Document::where('status', 'Selesai')->count(),
            'total_staff' => User::where('role', 'staff')->count(),
        ];

        $recentDocuments = Document::with('documentType')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentDocuments'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        // Logic to update settings
        return back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
