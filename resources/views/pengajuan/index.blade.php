@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengajuan Surat</h2>
    <a href="{{ url('/pengajuan-surat/create') }}" class="btn btn-primary">Ajukan Surat</a>
    <table class="table">
        <thead>
            <tr>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $item)
            <tr>
                <td>{{ ucfirst($item->jenis_surat) }}</td>
                <td>{{ ucfirst($item->status) }}</td>
                <td>
                    @if($item->file_surat)
                        <a href="{{ asset('storage/' . $item->file_surat) }}" class="btn btn-success">Download</a>
                    @else
                        <span>Menunggu persetujuan...</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
