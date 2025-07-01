@extends('layouts.main.navbaradmin')
@section('title', 'Data Prediksi Mahasiswa')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-6">Data Prediksi Mahasiswa</h2>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Hasil Prediksi</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($catatans as $index => $catatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $catatan->nim }}</td>
                            <td>{{ $catatan->nama }}</td>
                            <td>{{ $catatan->hasil_prediksi }}</td>
                            <td>{{ $catatan->catatan }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada catatan yang diinput.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
