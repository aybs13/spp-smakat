<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Pengguna</h3>
    </div>
    <div class="card-body">
        <form method="post" action="/users/update/<?= $user['id'] ?>">
            <!-- Nama -->
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" required>
            </div>

            <!-- NISN -->
            <div class="form-group">
                <label for="nisn">NISN:</label>
                <input type="text" name="nisn" class="form-control" value="<?= $user['nisn'] ?>">
            </div>

            <!-- Username -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control" value="<?= $user['username'] ?>" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" value="<?= $user['password'] ?>" required>
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <!-- Role -->
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="siswa" <?= $user['role'] == 'siswa' ? 'selected' : '' ?>>Siswa</option>
                </select>
            </div>

            <!-- Kelas -->
            <div class="form-group">
                <label for="class">Kelas:</label>
                <input type="text" name="class" class="form-control" value="<?= $user['class'] ?>">
            </div>

            <!-- Jurusan -->
            <div class="form-group">
                <label for="jurusan">Jurusan:</label>
                <input type="text" name="jurusan" class="form-control" value="<?= $user['jurusan'] ?>">
            </div>

            <!-- Tempat Lahir -->
            <div class="form-group">
                <label for="birth_place">Tempat Lahir:</label>
                <input type="text" name="birth_place" class="form-control" value="<?= $user['birth_place'] ?>">
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="birth_date">Tanggal Lahir:</label>
                <input type="date" name="birth_date" class="form-control" value="<?= $user['birth_date'] ?>">
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea name="address" class="form-control"><?= $user['address'] ?></textarea>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" class="form-control">
                    <option value="L" <?= $user['gender'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                    <option value="P" <?= $user['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>

            <!-- Submit button -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="/users" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
