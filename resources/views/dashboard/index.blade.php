@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dashboard</h2>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    @if(Auth::user()->hasRole('mahasiswa'))
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Pengajuan Surat</h5>
                <p>Ajukan surat keterangan dengan mudah melalui sistem ini.</p>
                <a href="{{ route('pengajuan_surat.index') }}" class="btn btn-primary">Kelola Pengajuan</a>
            </div>
        </div>
    @elseif(Auth::user()->hasRole('ketua_prodi'))
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Persetujuan Surat</h5>
                <p>Kelola dan setujui pengajuan surat dari mahasiswa.</p>
                <a href="{{ route('persetujuan_surat.index') }}" class="btn btn-warning">Lihat Pengajuan</a>
            </div>
        </div>
    @elseif(Auth::user()->hasRole('manajer_operasional') || Auth::user()->hasRole('tata_usaha'))
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Unggah Surat</h5>
                <p>Upload surat yang telah disetujui oleh ketua program studi.</p>
                <a href="{{ route('upload_surat.index') }}" class="btn btn-success">Kelola Surat</a>
            </div>
        </div>
    @endif
</div>
@endsection
