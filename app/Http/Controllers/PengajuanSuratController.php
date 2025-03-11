<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Auth;

class PengajuanSuratController extends Controller
{
    // Menampilkan daftar pengajuan surat mahasiswa
    public function index()
    {
        $pengajuan = PengajuanSurat::where('mahasiswa_id', Auth::id())->get();
        return view('pengajuan.index', compact('pengajuan'));
    }

    // Menampilkan form pengajuan surat
    public function create()
    {
        return view('pengajuan.create');
    }

    // Menyimpan pengajuan surat ke database
    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|in:aktif,pengantar_tugas,keterangan_lulus,laporan_hasil_studi',
        ]);

        PengajuanSurat::create([
            'mahasiswa_id' => Auth::id(),
            'program_studi_id' => Auth::user()->program_studi_id,
            'jenis_surat' => $request->jenis_surat,
            'status' => 'diajukan'
        ]);

        return redirect('/pengajuan-surat')->with('success', 'Pengajuan surat berhasil dikirim.');
    }
}
