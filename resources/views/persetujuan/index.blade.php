@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengajuan Surat untuk Disetujui</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Jenis Surat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajuan as $item)
            <tr>
                <td>{{ $item->user->nama }}</td>
                <td>{{ ucfirst($item->jenis_surat) }}</td>
                <td>
                    <form action="{{ url('/persetujuan-surat/' . $item->id . '/approve') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Setujui</button>
                    </form>
                    <form action="{{ url('/persetujuan-surat/' . $item->id . '/reject') }}" method="POST">
                        @csrf
                        <input type="text" name="komentar" placeholder="Alasan penolakan" required>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
