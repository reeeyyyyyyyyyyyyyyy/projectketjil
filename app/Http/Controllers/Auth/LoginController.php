<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login dengan penanganan CSRF yang lebih baik
    public function login(Request $request)
    {
        // Validasi input
        $this->validateLogin($request);

        // Throttling untuk mencegah brute force
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // Coba autentikasi
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // Increment login attempts
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    // Validasi login
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);
    }

    // Attempt login
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        // Tambahkan debug
        logger('Login attempt: ', $credentials);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            logger('Login success!');
            return true;
        }

        logger('Login failed!');
        return false;
    }


    // Get credentials
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    // Send successful login response
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, Auth::user())
            ?: redirect()->intended($this->redirectPath());
    }

    // Handle successful authentication
    protected function authenticated(Request $request, $user)
    {
        // Redirect berdasarkan role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'staff') {
            return redirect()->route('staff.dashboard');
        } else {
            return redirect()->route('guest.dashboard');
        }
    }

    // Send failed login response
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    // Logout dengan regenerasi token
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Anda telah berhasil logout.');
    }

    // Method untuk redirect path
    protected function redirectPath()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return route('admin.dashboard');
        } elseif ($user->role === 'staff') {
            return route('staff.dashboard');
        }

        return route('guest.dashboard');
    }
}

