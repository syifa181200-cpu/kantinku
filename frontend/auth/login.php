// 1. Logika Login di frontend/auth/login.php
<?php
session_start();
if (isset($_SESSION['user'])) {
    $r = $_SESSION['user']['role'];
    if ($r === 'admin') header("Location: ../admin/index.php");
    elseif ($r === 'petugas') header("Location: ../petugas/index.php");
    else header("Location: ../siswa/index.php");
    exit;
}

require_once __DIR__ . '/../../backend/config/Database.php';
require_once __DIR__ . '/../../backend/models/User.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        $db = (new Database())->getConnection();
        $userModel = new User($db);
        $user = $userModel->login($username, $password);

        if ($user) {
            session_regenerate_id(true);
            $_SESSION['user'] = [
                'id'           => $user['id'],
                'username'     => $user['username'],
                'nama_lengkap' => $user['nama_lengkap'],
                'role'         => $user['role']
            ];

            if ($user['role'] === 'admin') header("Location: ../admin/index.php");
            elseif ($user['role'] === 'petugas') header("Location: ../petugas/index.php");
            else header("Location: ../siswa/index.php");
            exit;
        } else {
            $error = "Username atau kata sandi tidak valid.";
        }
    } else {
        $error = "Harap masukkan username dan kata sandi.";
    }
}
?>