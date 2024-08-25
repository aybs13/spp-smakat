<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPP Smakatolik</title>
    <!-- CSS AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('AdminLTE/dist/css/adminlte.min.css') ?>">
    <style>
        .login-page {
            background: linear-gradient(to right, #C0C0C0, #2575fc), url('<?= base_url('academic_background.jpg') ?>') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            width: 500px;
            margin-top: 5%;
        }
        .login-logo a {
            color: #fff;
            font-size: 35px;
        }
        .login-logo img {
            max-width: 50px;
            margin-bottom: 10px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-box-msg {
            font-weight: bold;
            font-size: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            padding: 15px;
            font-size: 18px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .background-illustration {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 120px;
            opacity: 0.8;
        }
        /* Tambahkan ikon terkait pendidikan */
        .academic-icons {
            text-align: center;
            margin-bottom: 20px;
        }
        .academic-icons i {
            font-size: 40px;
            color: #007bff;
            margin: 0 10px;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="<?= base_url('logo.png') ?>" alt="Logo Smakatolik">
            <a href="#"><b>SPP</b> Smakatolik</a>
        </div>

        <!-- Background Illustration -->
        <img class="background-illustration" src="<?= base_url('academic_illustration.png') ?>" alt="Academic Illustration">

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan login untuk mengakses sistem</p>

                <!-- Tambahkan ikon-ikon pendidikan -->
                <div class="academic-icons">
                    <i class="fas fa-graduation-cap"></i>
                    <i class="fas fa-book"></i>
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <form method="post" action="/login/process">
                    <!-- Username Field -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Role Selection -->
                    <div class="input-group mb-3">
                        <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <!-- Flash Error Message -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger mt-3">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- JS AdminLTE -->
    <script src="<?= base_url('AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('AdminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
