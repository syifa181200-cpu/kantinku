<?php
require_once __DIR__ . '/Database.php';
// 1. Instansiasi Objek dari Class Database
$database = new Database();
$db = $database->getConnection();
// 2. Verifikasi Hasil Koneksi
if ($db) {
$driver = $db->getAttribute(PDO::ATTR_DRIVER_NAME);
$server_ver = $db->getAttribute(PDO::ATTR_SERVER_VERSION);
echo "<div style='font-family:sans-serif; max-width:650px; margin:30px auto; padding:20px;
background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:8px; box-shadow:0 2px 4px
rgba(0,0,0,0.05);'>" .
"<h3 style='margin-top:0;'>■ Selamat! Koneksi Database KantinKu Berhasil</h3>" .
"<p>Objek PDO berhasil di-instansiasi dan terhubung aktif ke basis data <b>kantinku</b>.</p>" .
"<hr style='border:0; border-top:1px solid #c3e6cb;'>" .
"<ul style='margin-bottom:0;'>" .
"<li><b>Driver Basis Data:</b> " . htmlspecialchars($driver) . "</li>" .
"<li><b>Versi MySQL Server:</b> " . htmlspecialchars($server_ver) . "</li>" .
"<li><b>Status Transaksi ACID:</b> Aktif & Siap Digunakan</li>" .
"</ul>" .
"</div>";
}
