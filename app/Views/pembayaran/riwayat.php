<?= $this->extend('layouts/siswa_layout') ?>

<?= $this->section('content') ?>
<div class="card shadow-lg rounded">
    <div class="card-header bg-gradient-dark text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title font-weight-bold mb-0"><i class="fas fa-history mr-2"></i>Riwayat Pembayaran SPP</h3>
    </div>
    <div class="card-body">
        <!-- Tabel Daftar Pembayaran -->
        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><i class="fas fa-calendar-alt mr-2"></i>Bulan</th>
                    <th><i class="fas fa-calendar mr-2"></i>Tahun Ajaran</th>
                    <th><i class="fas fa-coins mr-2"></i>Jumlah</th>
                    <th><i class="fas fa-receipt mr-2"></i>Order ID</th>
                    <th><i class="fas fa-credit-card mr-2"></i>Transaction ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($pembayaran) > 0): ?>
                    <?php 
                    // Mapping angka bulan ke nama bulan
                    $daftarBulan = [
                        '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', 
                        '04' => 'April', '05' => 'Mei', '06' => 'Juni', 
                        '07' => 'Juli', '08' => 'Agustus', '09' => 'September', 
                        '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
                    ];
                    ?>
                    <?php foreach ($pembayaran as $p): ?>
                    <tr>
                        <td><?= $daftarBulan[$p['bulan']] ?></td>
                        <td><?= $p['tahun_ajaran'] ?></td>
                        <td>Rp <?= number_format($p['jumlah'], 0, ',', '.') ?></td>
                        <td><?= $p['midtrans_order_id'] ?></td>
                        <td><?= $p['midtrans_transaction_id'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            <i class="fas fa-info-circle mr-2"></i>Belum ada riwayat pembayaran
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
