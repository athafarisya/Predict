@extends('layouts.main.navbarmhs')
@section('title', 'Prediksi')

@section('content')
<main class="mx-4 border">
    <div class="container-fluid px-4">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h2 class="mt-4">Prediksi</h2>

        <form method="POST" action="{{ route('prediksi.predict') }}">
            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" value="{{ $mahasiswa->nama }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" value="{{ $mahasiswa->nim }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" value="{{ $mahasiswa->umur }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Masa Studi</label>
                    <input type="number" name="masa_studi" class="form-control" value="{{ $mahasiswa->masa_studi }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label>Status Bekerja</label>
                    <select name="status_bekerja" class="form-select">
                        <option value="1" {{ $mahasiswa->status_bekerja == '1' ? 'selected' : '' }}>Ya</option>
                        <option value="0" {{ $mahasiswa->status_bekerja == '0' ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label>Kegiatan Organisasi/UKM</label>
                    <select name="status_kegiatan" class="form-select">
                        <option value="1" {{ $mahasiswa->kegiatan_organisasi == '1' ? 'selected' : '' }}>Ikut</option>
                        <option value="0" {{ $mahasiswa->kegiatan_organisasi == '0' ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>

                @for ($i = 1; $i <= 7; $i++)
                    @php $ips = 'ips' . $i; @endphp
                    <div class="col-md-3 mb-3">
                        <label>IPS{{ $i }}</label>
                        <input type="number" step="0.01" max="4.0" min="0.0" name="ips{{ $i }}" class="form-control" value="{{ $mahasiswa->$ips }}">
                    </div>
                @endfor

                <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-primary">Prediksi</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
