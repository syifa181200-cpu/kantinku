<?php
session_start();
if (isset($_SESSION['user'])) { 
    header("Location: ../../index.php"); 
    exit; 
}

require_once __DIR__ . '/../../backend/config/Database.php';
require_once __DIR__ . '/../../backend/models/User.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $nama     = trim($_POST['nama_lengkap'] ?? '');
    $noHp     = trim($_POST['no_hp'] ?? '');

    if (!empty($username) && !empty($password) && !empty($nama)) {
        try {
            $db = (new Database())->getConnection();
            $userModel = new User($db);
            $userModel->register($username, $password, $nama, $noHp);
            $_SESSION['register_success'] = "Pendaftaran berhasil! Silakan login.";
            header("Location: login.php");
            exit;
        } catch (Exception $e) { 
            $error = $e->getMessage(); 
        }
    } else { 
        $error = "Harap lengkapi seluruh formulir!"; 
    }
}
?>