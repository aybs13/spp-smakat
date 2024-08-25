<?= $this->extend('layouts/siswa_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-lg rounded">
    <div class="card-header bg-gradient-dark text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title font-weight-bold mb-0"><i class="fas fa-money-bill-wave mr-2"></i>Daftar Pembayaran SPP Tahun Ajaran <?= date('Y') ?></h3>
    </div>
    <div class="card-body">
        <!-- Tampilkan pesan sukses jika ada -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle mr-2"></i> <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Tabel Daftar Pembayaran -->
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><i class="fas fa-calendar-alt mr-2"></i>Bulan</th>
                    <th><i class="fas fa-calendar mr-2"></i>Tahun Ajaran</th>
                    <th><i class="fas fa-coins mr-2"></i>Jumlah</th>
                    <th><i class="fas fa-check mr-2"></i>Status</th>
                    <th class="text-center"><i class="fas fa-cog mr-2"></i>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pembayaran) > 0): ?>
                    <?php foreach ($pembayaran as $p): ?>
                    <tr>
                        <td><?= $p['bulan_name'] ?></td>
                        <td><?= $p['tahun_ajaran'] ?></td>
                        <td>Rp <?= number_format($p['jumlah'], 0, ',', '.') ?></td>
                        <td>
                            <?= $p['status'] == 'sudah_bayar' 
                                ? '<span class="badge badge-success"><i class="fas fa-check-circle"></i> Sudah Bayar</span>' 
                                : '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Bayar</span>' ?>
                        </td>
                        <td class="text-center">
                            <?php if ($p['status'] == 'belum_bayar'): ?>
                                <a href="/pembayaran/bayar/<?= $p['id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-wallet"></i> Bayar
                                </a>
                            <?php else: ?>
                                <span class="text-muted"><i class="fas fa-check-double"></i> Sudah Dibayar</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted"><i class="fas fa-info-circle mr-2"></i>Belum ada data pembayaran</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
