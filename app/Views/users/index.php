<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-lg rounded">
    <div class="card-header bg-gradient-dark text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title font-weight-bold mb-0"><i class="fas fa-users mr-2"></i> Daftar Pengguna</h3>
        <a href="/users/create" class="btn btn-outline-light btn-sm shadow-sm ml-auto">
            <i class="fas fa-user-plus mr-2"></i>Tambah Pengguna
        </a>
    </div>

    <div class="card-body">
        <!-- Daftar Admin -->
        <h4 class="text-info mb-3"><i class="fas fa-user-shield mr-2"></i>Daftar Admin</h4>
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><i class="fas fa-user mr-1"></i> Nama</th>
                    <th><i class="fas fa-user-tag mr-1"></i> Username</th>
                    <th><i class="fas fa-birthday-cake mr-1"></i> Tanggal Lahir</th>
                    <th><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</th>
                    <th><i class="fas fa-user-cog mr-1"></i> Role</th>
                    <th class="text-center"><i class="fas fa-tools mr-1"></i> Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <?php if($user['role'] == 'admin'): ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= date('d-m-Y', strtotime($user['birth_date'])) ?></td>
                        <td><?= ($user['gender'] == 'L') ? 'Laki-Laki' : 'Perempuan' ?></td>
                        <td><span class="badge badge-primary"><?= ucfirst($user['role']) ?></span></td>
                        <td class="text-center">
                            <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <a href="/users/delete/<?= $user['id'] ?>" onclick="return confirm('Hapus pengguna ini?')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Daftar Siswa -->
        <h4 class="text-info mt-5"><i class="fas fa-user-graduate mr-2"></i>Daftar Siswa</h4>
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><i class="fas fa-user mr-1"></i> Nama</th>
                    <th><i class="fas fa-id-badge mr-1"></i> NISN</th>
                    <th><i class="fas fa-user-tag mr-1"></i> Username</th>
                    <th><i class="fas fa-school mr-1"></i> Kelas</th>
                    <th><i class="fas fa-book-open mr-1"></i> Jurusan</th>
                    <th><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</th>
                    <th><i class="fas fa-birthday-cake mr-1"></i> Tanggal Lahir</th>
                    <th><i class="fas fa-home mr-1"></i> Alamat</th>
                    <th><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</th>
                    <th><i class="fas fa-user-graduate mr-1"></i> Role</th>
                    <th class="text-center"><i class="fas fa-tools mr-1"></i> Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <?php if($user['role'] == 'siswa'): ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['nisn'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['class'] ?></td>
                        <td><?= $user['jurusan'] ?></td>
                        <td><?= $user['birth_place'] ?></td>
                        <td><?= date('d-m-Y', strtotime($user['birth_date'])) ?></td>
                        <td><?= $user['address'] ?></td>
                        <td><?= ($user['gender'] == 'L') ? 'Laki-Laki' : 'Perempuan' ?></td>
                        <td><span class="badge badge-success"><?= ucfirst($user['role']) ?></span></td>
                        <td class="text-center">
                            <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <a href="/users/delete/<?= $user['id'] ?>" onclick="return confirm('Hapus pengguna ini?')" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash mr-1"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
