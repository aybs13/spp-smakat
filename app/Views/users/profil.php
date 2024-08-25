<?= $this->extend('layouts/siswa_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-lg rounded">
    <div class="card-header bg-gradient-dark text-white">
        <h3 class="card-title font-weight-bold mb-0"><i class="fas fa-user mr-2"></i> Profil Siswa</h3>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <tr>
                <th><i class="fas fa-user mr-2"></i> Nama</th>
                <td><?= $siswa['name'] ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-id-badge mr-2"></i> NISN</th>
                <td><?= $siswa['nisn'] ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-school mr-2"></i> Kelas</th>
                <td><?= $siswa['class'] ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-book mr-2"></i> Jurusan</th>
                <td><?= $siswa['jurusan'] ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-map-marker-alt mr-2"></i> Tempat Lahir</th>
                <td><?= $siswa['birth_place'] ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-calendar-alt mr-2"></i> Tanggal Lahir</th>
                <td><?= date('d-m-Y', strtotime($siswa['birth_date'])) ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-home mr-2"></i> Alamat</th>
                <td><?= $siswa['address'] ?></td>
            </tr>
            <tr>
                <th><i class="fas fa-venus-mars mr-2"></i> Jenis Kelamin</th>
                <td><?= $siswa['gender'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
            </tr>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
