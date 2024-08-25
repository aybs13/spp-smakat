<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Jurusan</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/jurusan/store">
                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan:</label>
                    <input type="text" name="nama_jurusan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
