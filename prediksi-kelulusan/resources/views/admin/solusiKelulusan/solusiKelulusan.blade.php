@extends('layouts.main.navbaradmin')
@section('title', 'Solusi Kelulusan')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-6">Solusi Kelulusan</h2>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{-- <h5>Data Solusi Kelulusan</h5> --}}
                <button class="btn btn-success btn-sm" onclick="showModal()">Tambah Solusi Kelulusan
                </button>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu Kelulusan</th>
                            <th>Solusi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</main>

@include('admin.solusiKelulusan.modal') {{-- Memanggil modal --}}

<script>
    let save_method = ''; // Variabel untuk menentukan method (add atau update)
    let solusiId = null;   // Menyimpan id solusi yang sedang di-edit

    $(document).ready(function() {
        $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("solusi.data") }}',
                type: 'GET',
                error: function(xhr) {
                    console.error('DataTable Error:', xhr.responseText);
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'waktu_kelulusan', name: 'waktu_kelulusan' },
                { data: 'solusi', name: 'solusi' },
                { data: 'aksi', name: 'aksi', orderable: false, searchable: false }
            ]
        });
    });

    function resetValidation() {
        $('.is-invalid').removeClass('is-invalid');
        $('.is-valid').removeClass('is-valid');
        $('span.invalid-feedback').remove();
    }

    function showModal() {
        save_method = 'add'; // Menentukan operasi tambah
        solusiId = null;
        $('#solusiForm')[0].reset(); // Reset form
        resetValidation();
        $('#solusiModal').modal('show');
        $('.modal-title').text('Tambah Solusi Kelulusan');
        $('.btnSubmit').text('Simpan');
    }

    // Store and update
    $('#solusiForm').on('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pastikan data yang Anda masukkan sudah benar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed) {
                const formData = new FormData(this);

                let url = "solusi",
                    method = "POST";

                if (save_method === 'update') {
                    url = 'solusi/' + solusiId;
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: method,
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Good job!",
                            text: response.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#solusiModal').modal('hide');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR.responseText);
                    }
                });
            }
        });
    });

    function editModal(e) {
        solusiId = e.getAttribute('data-id');
        save_method = 'update';

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "solusi/" + solusiId,
            success: function(response) {
                if (response.data) {
                    let result = response.data;
                    $('#waktu_kelulusan').val(result.waktu_kelulusan);
                    $('#solusi').val(result.solusi);

                    resetValidation();
                    $('#solusiModal').modal('show');
                    $('.modal-title').text('Update data Solusi Kelulusan');
                    $('.btnSubmit').text('Perbarui');
                } else {
                    console.error('Data tidak ditemukan:', response);
                    Swal.fire('Error', 'Data tidak ditemukan!', 'error');
                }
            },
            error: function(jqXHR) {
                console.log(jqXHR.responseText);
                Swal.fire('Error', 'Terjadi kesalahan saat memuat data!', 'error');
            }
        });
    }


    function deleteModal(e) {
        solusiId = e.getAttribute('data-id');
        if (!solusiId) {
            alert("ID tidak ditemukan!");
            return;
        }

        Swal.fire({
            text: 'Apakah Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "solusi/" + solusiId,
                    type: "DELETE",
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload();
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.message,
                            icon: "success",
                            timer: 1500
                        });
                    },
                    error: function(xhr) {
                        console.error('Error deleting data:', xhr.responseText);
                    }
                });
            }
        });
    }

</script>
@endsection
