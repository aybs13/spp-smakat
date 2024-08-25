<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Jurusan</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/jurusan/update/<?= $jurusan['id'] ?>">
                <div class="form-group">
                    <label for="nama_jurusan">Nama Jurusan:</label>
                    <input type="text" name="nama_jurusan" class="form-control" value="<?= $jurusan['nama_jurusan'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
