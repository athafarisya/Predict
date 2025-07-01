@extends('layouts.main.navbaradmin')
@section('title', 'Data Mahasiswa')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-6">Data Mahasiswa</h2>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('dataMahasiswa.predictAll') }}" class="btn btn-warning btn-sm">Prediksi Semua Mahasiswa</a>
                </div>
                <div>
                    <button class="btn btn-success btn-sm" onclick="openModal()">Tambah Mahasiswa</button>
                    <form action="{{ route('dataMahasiswa.import') }}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                        @csrf
                        <input type="file" name="file" accept=".xlsx, .xls" required class="d-none" id="importFile" onchange="this.form.submit()">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('importFile').click()">Import Data</button>
                    </form>
                    <a href="{{ route('dataMahasiswa.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
                    <a href="{{ route('dataMahasiswa.export') }}" class="btn btn-secondary btn-sm">Export Data</a>
                </div>
            </div>
            <div class="card-body" style="overflow-x: auto">
                <table class="table table-bordered" id="tabel-mahasiswa">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th>Status Bekerja</th>
                            <th>Kegiatan Organisasi</th>
                            <th>Masa Studi</th>
                            <th>IPS 1</th>
                            <th>IPS 2</th>
                            <th>IPS 3</th>
                            <th>IPS 4</th>
                            <th>IPS 5</th>
                            <th>IPS 6</th>
                            <th>IPS 7</th>
                            <th>Hasil Prediksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataMahasiswa as $mahasiswa)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa->umur }}</td>
                            <td>{{ $mahasiswa->jk }}</td>
                            <td>{{ $mahasiswa->status_bekerja }}</td>
                            <td>{{ $mahasiswa->kegiatan_organisasi }}</td>
                            <td>{{ $mahasiswa->masa_studi }}</td>
                            <td>{{ $mahasiswa->ips1 }}</td>
                            <td>{{ $mahasiswa->ips2 }}</td>
                            <td>{{ $mahasiswa->ips3 }}</td>
                            <td>{{ $mahasiswa->ips4 }}</td>
                            <td>{{ $mahasiswa->ips5 }}</td>
                            <td>{{ $mahasiswa->ips6 }}</td>
                            <td>{{ $mahasiswa->ips7 }}</td>
                            <td>{{ $mahasiswa->prediksiKelulusan->first()->hasil_prediksi ?? '-' }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" style="width:4rem; height:2rem" onclick="openModal({{ json_encode($mahasiswa) }})">Edit</button>
                                <form action="{{ route('dataMahasiswa.delete', $mahasiswa->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" style="width: 4rem; height:2rem" onclick="deleteData()">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="18" class="text-center">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="mahasiswaModal" tabindex="-1" aria-labelledby="mahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="justify-items: center">
        <div class="modal-content" style="width: 50rem">
            <div class="modal-header">
                <h5 class="modal-title" id="mahasiswaModalLabel">Tambah Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="mahasiswaForm" method="POST" action="{{ route('dataMahasiswa.save') }}">
                @csrf
                <input type="hidden" id="mahasiswa_id" name="id">
                <div class="modal-body row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="umur" class="form-label">Umur</label>
                            <input type="number" class="form-control" id="umur" name="umur" required>
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jk" name="jk" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_bekerja" class="form-label">Status Bekerja</label>
                            <input type="text" class="form-control" id="status_bekerja" name="status_bekerja" required>
                        </div>
                        <div class="mb-3">
                            <label for="kegiatan_organisasi" class="form-label">Kegiatan Organisasi</label>
                            <input type="text" class="form-control" id="kegiatan_organisasi" name="kegiatan_organisasi" required>
                        </div>
                        <div class="mb-3">
                            <label for="masa_studi" class="form-label">Masa Studi</label>
                            <input type="number" class="form-control" id="masa_studi" name="masa_studi" min="1" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="ips1" class="form-label">IPS 1</label>
                            <input type="number" step="0.01" class="form-control" id="ips1" name="ips1" min="0.0" max="4.0" required>
                        </div>
                        <div class="mb-3">
                            <label for="ips2" class="form-label">IPS 2</label>
                            <input type="number" step="0.01" class="form-control" id="ips2" name="ips2" min="0.0" max="4.0" required>
                        </div>
                        <div class="mb-3">
                            <label for="ips3" class="form-label">IPS 3</label>
                            <input type="number" step="0.01" class="form-control" id="ips3" name="ips3" min="0.0" max="4.0" required>
                        </div>
                        <div class="mb-3">
                            <label for="ips4" class="form-label">IPS 4</label>
                            <input type="number" step="0.01" class="form-control" id="ips4" name="ips4" min="0.0" max="4.0" required>
                        </div>
                        <div class="mb-3">
                            <label for="ips5" class="form-label">IPS 5 <small class="text-muted"></small></label>
                            <input type="number" step="0.01" class="form-control" id="ips5" name="ips5" min="0.0" max="4.0">
                        </div>
                        <div class="mb-3">
                            <label for="ips6" class="form-label">IPS 6 <small class="text-muted"></small></label>
                            <input type="number" step="0.01" class="form-control" id="ips6" name="ips6" min="0.0" max="4.0">
                        </div>
                        <div class="mb-3">
                            <label for="ips7" class="form-label">IPS 7 <small class="text-muted"></small></label>
                            <input type="number" step="0.01" class="form-control" id="ips7" name="ips7" min="0.0" max="4.0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal(mahasiswa = null) {
        if (mahasiswa) {
            document.getElementById('mahasiswaModalLabel').innerText = 'Edit Mahasiswa';
            document.getElementById('mahasiswa_id').value = mahasiswa.id || '';
            document.getElementById('nama').value = mahasiswa.nama || '';
            document.getElementById('nim').value = mahasiswa.nim || '';
            document.getElementById('umur').value = mahasiswa.umur || '';
            document.getElementById('jk').value = mahasiswa.jk || '';
            document.getElementById('status_bekerja').value = mahasiswa.status_bekerja || '';
            document.getElementById('kegiatan_organisasi').value = mahasiswa.kegiatan_organisasi || '';
            document.getElementById('masa_studi').value = mahasiswa.masa_studi || '';
            document.getElementById('ips1').value = mahasiswa.ips1 || '';
            document.getElementById('ips2').value = mahasiswa.ips2 || '';
            document.getElementById('ips3').value = mahasiswa.ips3 || '';
            document.getElementById('ips4').value = mahasiswa.ips4 || '';
            document.getElementById('ips5').value = mahasiswa.ips5 || '';
            document.getElementById('ips6').value = mahasiswa.ips6 || '';
            document.getElementById('ips7').value = mahasiswa.ips7 || '';
        } else {
            document.getElementById('mahasiswaModalLabel').innerText = 'Tambah Mahasiswa';
            document.getElementById('mahasiswaForm').reset();
            document.getElementById('mahasiswa_id').value = '';
        }
        new bootstrap.Modal(document.getElementById('mahasiswaModal')).show();
    }

    $(document).ready(function () {
        $('#tabel-mahasiswa').DataTable();
    });

    function deleteData() {
        event.preventDefault();
        var form = event.target.form;
        Swal.fire({
            text: "Apakah Anda yakin ingin menghapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Data berhasil dihapus.",
                    icon: "success"
                });
                form.submit();
            }
        });
    }
</script>
@endsection
