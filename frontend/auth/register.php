<?php
session_start();
$error = $_SESSION['error_register'] ?? '';
unset($_SESSION['error_register']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Siswa - KantinKu</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="auth-wrapper py-4">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5">
            <div class="card auth-card p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle mb-3" style="width: 65px; height: 65px;">
                        <i class="bi bi-person-plus-fill fs-2"></i>
                    </div>
                    <h3 class="fw-bold text-dark">Daftar Akun Siswa</h3>
                    <p class="text-muted small">Buat akun untuk mulai memesan makanan di KantinKu</p>
                </div>

                <div id="alertError" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i><span id="errorText"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>


              <?php if ($error !== ''): ?>
 <div class="alert alert-danger">
 <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
 </div>
<?php endif; ?>
<form action="../../backend/auth/register.php" method="POST">
 <div class="mb-3">
 <label for="nama">Nama lengkap</label>
 <input class="form-control" id="nama" name="nama"
 maxlength="100" required>
 </div>
 <div class="mb-3">
 <label for="username">Username</label>
 <input class="form-control" id="username" name="username"
 maxlength="50" required>
 </div>
 <div class="mb-3">
 <label for="password">Password</label>
 <input type="password" class="form-control"
 id="password" name="password" required>
 </div>
 <div class="mb-3">
 <label for="konfirmasi_password">Ulangi password</label>
 <input type="password" class="form-control"
 id="konfirmasi_password" name="konfirmasi_password"
 required>
 </div>
 <button type="submit" class="btn btn-success w-100">
 Daftar sekarang
 </button>
</form>

                <div class="text-center pt-3 border-top">
                    <p class="small text-muted mb-0">Sudah punya akun? <a href="login.php" class="fw-bold text-decoration-none text-primary">Masuk di sini</a></p>
                    <a href="../../index.php" class="small text-secondary d-inline-block mt-2"><i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda Utama</a>
                </div>
            </div>

            <div class="text-center mt-3 text-white-50 small">
                &copy; 2026 KantinKu - School Canteen Ecosystem
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
