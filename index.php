<?php
session_start();
require_once __DIR__ . '/backend/config/Database.php';
require_once __DIR__ . '/backend/models/Kategori.php';
require_once __DIR__ . '/backend/models/Produk.php';

// Gateway Router: auto-redirect jika sudah memiliki session aktif
if (isset($_SESSION['user'])) {
    $r = $_SESSION['user']['role'];
    if ($r === 'admin') { header("Location: frontend/admin/index.php"); exit; }
    if ($r === 'petugas') { header("Location: frontend/petugas/index.php"); exit; }
    if ($r === 'siswa') { header("Location: frontend/siswa/index.php"); exit; }
}

$db = (new Database())->getConnection();
$kategoriModel = new Kategori($db);
$produkModel   = new Produk($db);

$kategoriList = $kategoriModel->getAll();
$produkList   = $produkModel->getAll();
$isLoggedIn   = isset($_SESSION['user']);
?>
