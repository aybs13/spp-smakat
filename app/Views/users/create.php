<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Pengguna</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/users/store">

                <!-- Role -->
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="form-control" onchange="toggleRoleFields()">
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>

                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <!-- NISN (Hanya untuk Siswa) -->
                <div id="nisn-field" class="form-group" style="display:none;">
                    <label for="nisn">NISN:</label>
                    <input type="text" name="nisn" class="form-control">
                </div>

                <!-- Kelas (Hanya untuk Siswa) -->
                <div id="class-field" class="form-group" style="display:none;">
                    <label for="class">Kelas:</label>
                    <select name="class" class="form-control">
                        <option value="">Pilih Kelas</option>
                        <?php foreach($kelas as $kls): ?>
                            <option value="<?= $kls['nama_kelas'] ?>"><?= $kls['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Jurusan (Hanya untuk Siswa) -->
                <div id="jurusan-field" class="form-group" style="display:none;">
                    <label for="jurusan">Jurusan:</label>
                    <select name="jurusan" class="form-control">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach($jurusan as $jrs): ?>
                            <option value="<?= $jrs['nama_jurusan'] ?>"><?= $jrs['nama_jurusan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Tempat Lahir -->
                <div class="form-group">
                    <label for="birth_place">Tempat Lahir:</label>
                    <input type="text" name="birth_place" class="form-control">
                </div>

                <!-- Tanggal Lahir -->
                <div class="form-group">
                    <label for="birth_date">Tanggal Lahir:</label>
                    <input type="date" name="birth_date" class="form-control">
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <textarea name="address" class="form-control"></textarea>
                </div>

                <!-- Jenis Kelamin -->
                <div class="form-group">
                    <label for="gender">Jenis Kelamin:</label>
                    <select name="gender" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

<script>
    // JavaScript untuk toggle fields berdasarkan role
    function toggleRoleFields() {
        var role = document.getElementById('role').value;
        if (role == 'siswa') {
            document.getElementById('nisn-field').style.display = 'block';
            document.getElementById('class-field').style.display = 'block';
            document.getElementById('jurusan-field').style.display = 'block';
        } else {
            document.getElementById('nisn-field').style.display = 'none';
            document.getElementById('class-field').style.display = 'none';
            document.getElementById('jurusan-field').style.display = 'none';
        }
    }

    // Memanggil fungsi saat halaman dimuat agar sesuai dengan default role yang dipilih
    document.addEventListener('DOMContentLoaded', function () {
        toggleRoleFields();
    });
</script>
<?= $this->endSection() ?>
