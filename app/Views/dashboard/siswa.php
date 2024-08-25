<?= $this->extend('layouts/siswa_layout') ?>

<?= $this->section('title') ?>
    Dashboard Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Welcome Message -->
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info shadow-sm rounded">
                <h4 class="mb-0">Selamat datang</h4>
                <p class="mb-0">Selamat belajar dan semoga sukses selalu.</p>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
        <!-- Profil Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="small-box bg-info shadow-sm rounded">
                <div class="inner">
                    <h3>Profil</h3>
                    <p>Lihat Profil Siswa</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="<?= base_url('/siswa/profil') ?>" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Pembayaran Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="small-box bg-success shadow-sm rounded">
                <div class="inner">
                    <h3>Pembayaran</h3>
                    <p>Lihat dan lakukan pembayaran</p>
                </div>
                <div class="icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <a href="<?= base_url('/siswa/pembayaran') ?>" class="small-box-footer">
                    Bayar <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Riwayat Card -->
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="small-box bg-warning shadow-sm rounded">
                <div class="inner">
                    <h3>Riwayat</h3>
                    <p>Lihat riwayat pembayaran</p>
                </div>
                <div class="icon">
                    <i class="fas fa-history"></i>
                </div>
                <a href="<?= base_url('/siswa/riwayat') ?>" class="small-box-footer">
                    Lihat <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
