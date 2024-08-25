<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Kelas</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/kelas/store">
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas:</label>
                    <input type="text" name="nama_kelas" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
