@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajukan Surat</h2>
    <form action="{{ url('/pengajuan-surat') }}" method="POST">
        @csrf
        <label for="jenis_surat">Pilih Jenis Surat:</label>
        <select name="jenis_surat" class="form-control">
            <option value="aktif">Surat Keterangan Mahasiswa Aktif</option>
            <option value="pengantar_tugas">Surat Pengantar Tugas</option>
            <option value="keterangan_lulus">Surat Keterangan Lulus</option>
            <option value="laporan_hasil_studi">Laporan Hasil Studi</option>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
    </form>
</div>
@endsection
