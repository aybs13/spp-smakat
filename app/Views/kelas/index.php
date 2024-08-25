<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="card shadow-lg rounded">
        <div class="card-header bg-gradient-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title font-weight-bold mb-0"><i class="fas fa-school mr-2"></i> Daftar Kelas</h3>
            <a href="/kelas/create" class="btn btn-outline-light btn-sm shadow-sm ml-auto">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Kelas
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th><i class="fas fa-chalkboard mr-1"></i> Nama Kelas</th>
                        <th class="text-center"><i class="fas fa-tools mr-1"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kelas as $k): ?>
                    <tr>
                        <td><?= $k['nama_kelas'] ?></td>
                        <td class="text-center">
                            <a href="/kelas/edit/<?= $k['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <a href="/kelas/delete/<?= $k['id'] ?>" onclick="return confirm('Hapus kelas ini?')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt mr-1"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>
