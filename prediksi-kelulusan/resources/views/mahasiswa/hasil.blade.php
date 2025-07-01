@extends('layouts.main.navbarmhs')
@section('title', 'Hasil Prediksi')

@section('content')
    <main class="mx-4 border py-2">
        @if ($result['prediction'] == 'Tepat waktu')
            <div class="alert alert-success" role="alert">
                LULUS TEPAT WAKTU <span> || PROBABILITY : <?= $probability?></span>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                LULUS TIDAK TEPAT WAKTU <span> || PROBABILITY : <?= $probability?></span>
            </div>
        @endif

        <div class="container-fluid px-4">
            <h2 class="mt-4">Detail Hasil Prediksi</h2>
            <div class="row">

                <!-- Nama -->
                <div class="col-md-4 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" value="{{ $input->nama }}" readonly>
                </div>

                <!-- NIM -->
                <div class="col-md-4 mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" value="{{ $input->nim }}" readonly>
                </div>
                <!-- Umur -->
                <div class="col-md-3 mb-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" id="umur" value="{{ $input->umur }}" readonly>
                </div>
                <!-- Masa Studi -->
                <div class="col-md-3 mb-3">
                    <label for="masa_studi" class="form-label">Masa Studi</label>
                    <input type="number" class="form-control" id="masa_studi" value="{{ $input->masa_studi }}" readonly>
                </div>
                <!-- Kegiatan Organisasi -->
                <div class="col-md-6 mb-3">
                    <label for="status_kegiatan" class="form-label">Kegiatan Organisasi/UKM</label>
                    <input type="text" class="form-control" id="status_kegiatan"
                        value="{{ $input->status_kegiatan == 1 ? 'Ikut' : 'Tidak Ikut' }}" readonly>
                </div>

                <!-- Penghasilan Orang Tua -->
                <div class="col-md-6 mb-3">
                    <label for="status_bekerja" class="form-label">Status Bekerja</label>
                    <input type="text" class="form-control" id="penghasilan_ortu"
                        value="{{ $input->status_kegiatan == 1 ? 'Ya' : 'Tidak' }}" readonly>
                </div>

                <!-- IPS -->
                @for ($i = 1; $i <= 7; $i++)
                    <div class="col-md-3 mb-3">
                        <label for="ips{{ $i }}" class="form-label">IPS{{ $i }}</label>
                        <input type="text" class="form-control" id="ips{{ $i }}"
                            value="{{ $input->{'ips' . $i} }}" readonly>
                    </div>
                @endfor

                <!-- Catatan -->
                <div class="col-md-12 mb-3 mt-3">
                    <h4>Catatan</h4>
                    @if ($catatan)
                        <p>{{ $catatan }}</p>
                    @else
                        <p class="text-muted">Tidak ada catatan tambahan.</p>
                    @endif
                </div>

                <!-- Tombol -->
                <div class="col-md-12 text-end">
                    @if ($result['prediction'] != 'Tepat waktu')
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputCatatanModal">
                            Input Catatan
                        </button>
                    @endif
                    <a href="{{ route('prediksi') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Input Catatan -->
    @if ($result['prediction'] != 'Tepat waktu')
        <div class="modal fade" id="inputCatatanModal" tabindex="-1" aria-labelledby="inputCatatanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputCatatanModalLabel">Masukkan Catatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <form action="{{ route('catatan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim"
                                    value="{{ $input->nim }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    value="{{ $input->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="hasil_prediksi" class="form-label">Hasil Prediksi</label>
                                <input type="text" class="form-control" name="hasil_prediksi"
                                    value="{{ $result['prediction'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" name="catatan" id="catatan" rows="3" required></textarea>
                            </div>
                            <input type="hidden" name="nim" value="{{ $input->nim }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
