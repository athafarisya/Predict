<div class="modal fade" id="solusiModal" tabindex="-1" aria-labelledby="solusiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solusiModalLabel">Tambah Solusi Kelulusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="solusiForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="waktu_kelulusan" class="form-label">Waktu Kelulusan</label>
                        <input type="text" class="form-control" id="waktu_kelulusan" name="waktu_kelulusan" required>
                    </div>
                    <div class="mb-3">
                        <label for="solusi" class="form-label">Solusi</label>
                        <textarea class="form-control" id="solusi" name="solusi" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary btnSubmit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
