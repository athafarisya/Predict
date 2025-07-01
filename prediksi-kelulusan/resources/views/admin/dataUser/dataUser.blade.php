@extends('layouts.main.navbaradmin')
@section('title', 'Data User')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-6">Data User</h2>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <button class="btn btn-success btn-sm" onclick="openModal()">Tambah User</button>
                    <form action="{{ route('dataUser.import') }}" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                        @csrf
                        <input type="file" name="file" accept=".xlsx, .xls" required class="d-none" id="importFile" onchange="this.form.submit()">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('importFile').click()">Import Data</button>
                    </form>
                    <a href="{{ route('dataUser.template') }}" class="btn btn-secondary btn-sm">Download Template</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel-user">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status Akun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataUser as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="openModal({{ json_encode($user) }})">Edit</button>
                                <form action="{{ route('dataUser.delete', $user->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="deleteData()">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="userForm" method="POST" action="{{ route('dataUser.save') }}">
                @csrf
                <input type="hidden" id="user_id" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role" required>
                            <option value="">Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="status" class="form-label">Status Akun</label>

                    <select class="form-select" id="status" name="status" required>
                        <option value="">Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
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
function openModal(user = null) {
    if (user) {
        document.getElementById('userModalLabel').innerText = 'Edit User';
        document.getElementById('user_id').value = user.id || '';
        document.getElementById('username').value = user.username || '';
        document.getElementById('role').value = user.role || '';
        document.getElementById('status').value = user.status || '';
    } else {
        document.getElementById('userModalLabel').innerText = 'Tambah User';
        document.getElementById('userForm').reset();
        document.getElementById('user_id').value = '';
    }
    new bootstrap.Modal(document.getElementById('userModal')).show();
}
 $(document).ready(function() {
            $('#tabel-user').DataTable();
        });
         function deleteData() {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                // title: "Are you sure?",
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
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    form.submit();
                }
            });
        }
</script>
@endsection
