<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // dd("halo");

            // Redirect berdasarkan role
            if (Auth::user()->role === 'admim') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'staff') {
                return redirect()->route('staff.dashboard');
            } else {
                return redirect()->route('guest.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function redirectTo()
    {
        // Redirect berdasarkan role
        if (Auth::role() === 'admin') {
            return route('admin.dashboard');
        } elseif (Auth::role() === 'staff') {
            return route('staff.dashboard');
        }

        // Default untuk guest
        return route('guest.dashboard');
    }
}
