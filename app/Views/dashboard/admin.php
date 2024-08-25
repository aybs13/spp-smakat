<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="row">
        <!-- Widget Jumlah Siswa -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info shadow-lg rounded-lg">
                <div class="inner">
                    <h3 class="font-weight-bold"><?= $jumlahSiswa ?></h3>
                    <p>Jumlah Siswa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <a href="<?= base_url('/users') ?>" class="small-box-footer text-light">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Widget Jumlah Kelas -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success shadow-lg rounded-lg">
                <div class="inner">
                    <h3 class="font-weight-bold"><?= $jumlahKelas ?></h3>
                    <p>Kelas Terdaftar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-school"></i>
                </div>
                <a href="<?= base_url('/kelas') ?>" class="small-box-footer text-light">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Widget Jumlah Jurusan -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning shadow-lg rounded-lg">
                <div class="inner">
                    <h3 class="font-weight-bold"><?= $jumlahJurusan ?></h3>
                    <p>Jurusan Terdaftar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="<?= base_url('/jurusan') ?>" class="small-box-footer text-light">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Widget Total Pembayaran -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger shadow-lg rounded-lg">
                <div class="inner">
                    <h3 class="font-weight-bold">Rp <?= number_format($totalPembayaran, 0, ',', '.') ?></h3>
                    <p>Total Pembayaran</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <a href="<?= base_url('/admin/laporan') ?>" class="small-box-footer text-light">Lihat Laporan <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-lg rounded-lg">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title">Selamat Datang di Dashboard Admin</h5>
                </div>
                <div class="card-body">
                    <p class="mb-3">Anda dapat mengelola data siswa, jurusan, kelas, dan laporan pembayaran dari sini. Gunakan menu di sebelah kiri untuk navigasi lebih lanjut.</p>
                    <p class="text-muted">Dashboard ini memberikan gambaran umum tentang data yang tersedia dalam sistem.</p>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
