<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\PersetujuanSuratController;

Route::get('/pengajuan-surat', [PengajuanSuratController::class, 'index']);
Route::get('/pengajuan-surat/create', [PengajuanSuratController::class, 'create']);
Route::post('/pengajuan-surat', [PengajuanSuratController::class, 'store']);

Route::get('/persetujuan-surat', [PersetujuanSuratController::class, 'index']);
Route::post('/persetujuan-surat/{id}/approve', [PersetujuanSuratController::class, 'approve']);
Route::post('/persetujuan-surat/{id}/reject', [PersetujuanSuratController::class, 'reject']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
