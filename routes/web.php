<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// Import Controller agar kode lebih pendek dan rapi
use App\Http\Controllers\Company\ProgramController;
use App\Http\Controllers\Hunter\ReportController;
use App\Http\Controllers\Admin\TriageController;
use App\Http\Controllers\AttachmentController;

Route::get('/', function () {
    return view('welcome');
});

// Fallback Dashboard & Profile
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('hunter.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Secure Download
    Route::get('attachments/{report}/download', [AttachmentController::class, 'download'])->name('attachments.download');
});

require __DIR__.'/auth.php';

// --- ADMIN ROUTES ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        // Ambil 5 User Terbaru
        $latestUsers = \App\Models\User::latest()->take(5)->get();
        
        // Ambil 5 Laporan Terbaru (beserta relasinya)
        $latestReports = \App\Models\Report::with('program', 'hunter')->latest()->take(5)->get();

        return view('admin.dashboard', compact('latestUsers', 'latestReports'));
    })->name('admin.dashboard');
});

// --- COMPANY ROUTES ---
Route::middleware(['auth', 'role:company'])->group(function () {
    Route::get('/company/dashboard', function () {
        $reports = \App\Models\Report::whereHas('program', function($query) {
            $query->where('company_id', auth()->id());
        })->with('program', 'hunter')->latest()->get();
        return view('company.dashboard', compact('reports'));
    })->name('company.dashboard');
    
    // CRUD Program (Standar Resource cocok untuk ini)
    Route::resource('company/programs', ProgramController::class)->names('company.programs');
});

// --- HUNTER ROUTES (YANG KITA PERBAIKI) ---
Route::middleware(['auth', 'role:hunter'])->prefix('hunter')->name('hunter.')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('hunter.dashboard');
    })->name('dashboard');

    // 1. List Program
    // URL: /hunter/programs
    Route::get('programs', [ReportController::class, 'index'])->name('reports.index');

    // 2. Form Submit Report
    // URL: /hunter/programs/{program}/submit
    // KITA HAPUS Resource, ganti manual ini agar ID {program} terbaca jelas
    Route::get('programs/{program}/submit', [ReportController::class, 'create'])->name('reports.create');

    // 3. Simpan Report
    // URL: /hunter/reports
    Route::post('reports', [ReportController::class, 'store'])->name('reports.store');
});

// --- SHARED ROUTES (TRIAGE) ---
// Perbaikan spasi: 'role:admin,company' (tanpa spasi setelah koma biar aman)
Route::middleware(['auth', 'role:admin,company'])->group(function () {
    Route::patch('reports/{report}/status', [TriageController::class, 'updateStatus'])
        ->name('reports.update-status');
});