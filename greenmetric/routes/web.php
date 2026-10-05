<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Rute Dashboard Utama
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute Dinamis untuk Masing-Masing dari 6 Indikator GreenMetric
Route::get('/indikator/{code}', [DashboardController::class, 'showIndikator'])->name('indikator.show');

// Rute Form Submisi Data Indikator (Tanpa Upload File)
Route::get('/submission', [DashboardController::class, 'submissionForm'])->name('submission.index');
Route::post('/submission', [DashboardController::class, 'storeSubmission'])->name('submission.store');