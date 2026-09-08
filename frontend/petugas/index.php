<?php
// Action Handler Meja Kasir di frontend/petugas/index.php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'petugas') {
    header("Location: ../auth/login.php");
    exit;
}

require_once __DIR__ . '/../../backend/config/Database.php';
require_once __DIR__ . '/../../backend/models/Pesanan.php';

$db = (new Database())->getConnection();
$pesananModel = new Pesanan($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action  = $_POST['action'] ?? '';
    $orderId = (int)($_POST['order_id'] ?? 0);

    if ($action === 'update_status') {
        $pesananModel->updateStatus($orderId, $_POST['status'], $_SESSION['user']['id']);
    } elseif ($action === 'update_payment_status') {
        $pesananModel->updatePaymentStatus($orderId, $_POST['status_pembayaran'], $_SESSION['user']['id']);
    }

    header("Location: index.php");
    exit;
}
?>
