<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="card shadow-lg rounded">
        <div class="card-header bg-gradient-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title font-weight-bold mb-0">
                <i class="fas fa-file-invoice-dollar mr-2"></i> Daftar Pembayaran SPP Tahun Ajaran <?= date('Y') ?>
            </h3>
            <!-- Filter Tahun Ajaran -->
            <form method="get" action="/admin/laporan" class="form-inline ml-auto w-500">
                <div class="input-group w-100">
                    <select name="tahun_ajaran" id="tahun_ajaran" class="form-control form-control-sm">
                        <option value="">Pilih Tahun Ajaran</option>
                        <?php foreach($available_years as $year): ?>
                            <option value="<?= $year['tahun_ajaran'] ?>" <?= ($selected_year == $year['tahun_ajaran']) ? 'selected' : '' ?>>
                                <?= $year['tahun_ajaran'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-light btn-sm">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <!-- Success message -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Payment table -->
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th><i class="fas fa-user mr-1"></i> Nama Siswa</th>
                        <th><i class="fas fa-calendar-alt mr-1"></i> Bulan</th>
                        <th><i class="fas fa-calendar mr-1"></i> Tahun Ajaran</th>
                        <th><i class="fas fa-money-bill-wave mr-1"></i> Jumlah</th>
                        <th><i class="fas fa-check mr-1"></i> Status</th>
                        <th class="text-center"><i class="fas fa-cogs mr-1"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($pembayaran) > 0): ?>
                        <?php foreach ($pembayaran as $p): ?>
                            <tr>
                                <td><?= $p['nama_siswa'] ?></td>
                                <td><?= $p['bulan_name'] ?></td>
                                <td><?= $p['tahun_ajaran'] ?></td>
                                <td>Rp <?= number_format($p['jumlah'], 0, ',', '.') ?></td>
                                <td>
                                    <?= $p['status'] == 'sudah_bayar' 
                                        ? '<span class="badge badge-success"><i class="fas fa-check-circle mr-1"></i> Sudah Bayar</span>' 
                                        : '<span class="badge badge-danger"><i class="fas fa-times-circle mr-1"></i> Belum Bayar</span>' ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['status'] == 'belum_bayar'): ?>
                                        <a href="/pembayaran/bayar/<?= $p['id'] ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-credit-card mr-1"></i> Bayar
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted"><i class="fas fa-check-circle mr-1"></i> Sudah Dibayar</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data pembayaran</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>
