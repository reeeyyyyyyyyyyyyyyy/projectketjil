<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class GuestLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.guest-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string',
            'email' => 'required|email'
        ]);

        $document = Document::where('tracking_number', $request->tracking_number)
            ->where('applicant_email', $request->email)
            ->first();

        if (!$document) {
            return back()->withErrors([
                'email' => 'Data tidak ditemukan. Pastikan nomor tracking dan email benar.'
            ])->withInput();
        }

        // Simpan data di session untuk akses guest
        session(['guest_document' => $document]);

        return redirect()->route('tracking.status', [
            'tracking_number' => $request->tracking_number
        ]);
    }
}
