<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingStatusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\GuestLoginController;
use Illuminate\Support\Facades\Auth;

// Route utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth Routes
Auth::routes(['register' => true]); // Aktifkan registrasi

// Public Tracking
Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking.status');
Route::post('/tracking', [TrackingController::class, 'search']);

// Guest Login (Tanpa akun)
Route::get('/guest-login', [GuestLoginController::class, 'showLoginForm'])->name('guest.login');
Route::post('/guest-login', [GuestLoginController::class, 'login']);

// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Guest Routes (Pelanggan) - Menggunakan middleware yang benar
Route::middleware(['auth', 'role:guest'])->prefix('guest')->name('guest.')->group(function () {
    Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');
    Route::get('/documents', [GuestController::class, 'documents'])->name('documents');
    Route::get('/documents/{id}', [GuestController::class, 'documentDetail'])->name('document.detail');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});

// Staff Routes (Pegawai) - Menggunakan middleware yang benar
Route::middleware(['auth', 'role:staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    Route::get('/documents', [StaffController::class, 'documents'])->name('documents');
    Route::get('/documents/{id}', [StaffController::class, 'documentDetail'])->name('document.detail');
    Route::put('/documents/{id}/status', [DocumentController::class, 'updateStatus'])->name('document.update-status');
    Route::get('/tracking', [StaffController::class, 'tracking'])->name('tracking');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});

// Admin Routes - Menggunakan middleware yang benar
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Document Types
    Route::resource('document-types', DocumentTypeController::class);

    // Documents
    Route::resource('documents', DocumentController::class);
    Route::put('/documents/{id}/status', [DocumentController::class, 'updateStatus'])->name('documents.update-status');

    // Officers
    Route::resource('officers', OfficerController::class);

    // Reports
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/today', [ReportController::class, 'today'])->name('reports.today');
    Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');

    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
});
