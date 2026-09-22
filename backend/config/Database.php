<?php
class Database {
// 1. Kredensial Server Database (Enkapsulasi Private)
private $host = "localhost";
private $db_name = "kantinku";
private $username = "root";
private $password = "";
public $conn;
// 2. Method Penghasil Objek Koneksi PDO Aktif
public function getConnection() {
$this->conn = null;
try {
$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false
];
$this->conn = new PDO($dsn, $this->username, $this->password, $options);
} catch (PDOException $e) {
die("<div style='font-family:sans-serif; padding:15px; background:#f8d7da; color:#721c24; border:1px solid
#f5c6cb; border-radius:6px;'>" .
"<h4 style='margin-top:0;'>Gagal Terhubung ke Basis Data KantinKu!</h4>" .
"<p style='margin-bottom:0;'><b>Pesan Kesalahan:</b> " . htmlspecialchars($e->getMessage()) . "</p>" .
"</div>");
}
return $this->conn;
}
}
