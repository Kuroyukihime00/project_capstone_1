<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\PersetujuanSuratController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk Pengajuan Surat oleh Mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index'])->name('pengajuan_surat.index');
    Route::get('/pengajuan-surat/create', [PengajuanSuratController::class, 'create'])->name('pengajuan_surat.create');
    Route::post('/pengajuan-surat', [PengajuanSuratController::class, 'store'])->name('pengajuan_surat.store');
    Route::delete('/pengajuan-surat/{id}', [PengajuanSuratController::class, 'destroy'])->name('pengajuan_surat.destroy');
});

// Route untuk Persetujuan Surat oleh Ketua Program Studi
Route::middleware(['auth', 'role:ketua_prodi'])->group(function () {
    Route::get('/persetujuan-surat', [PersetujuanSuratController::class, 'index'])->name('persetujuan_surat.index');
    Route::post('/persetujuan-surat/{id}/approve', [PersetujuanSuratController::class, 'approve'])->name('persetujuan_surat.approve');
    Route::post('/persetujuan-surat/{id}/reject', [PersetujuanSuratController::class, 'reject'])->name('persetujuan_surat.reject');
});

// Route untuk Manajer Operasional / Tata Usaha (Upload Surat)
Route::middleware(['auth', 'role:manajer_operasional,tata_usaha'])->group(function () {
    Route::get('/upload-surat', [PersetujuanSuratController::class, 'listApproved'])->name('upload_surat.index');
    Route::post('/upload-surat/{id}', [PersetujuanSuratController::class, 'upload'])->name('upload_surat.upload');
});

// Authentication Routes
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
