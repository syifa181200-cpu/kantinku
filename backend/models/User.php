<?php
// File: backend/models/User.php
class User {
    private $conn;
    private $table_name = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // 1. Registrasi Akun Siswa Baru
    public function register($nama, $username, $password, $role = 'siswa') {
        // Cek apakah username sudah dipakai
        $cek = $this->conn->prepare("SELECT id FROM " . $this->table_name . " WHERE username = ?");
        $cek->execute([strtolower(trim($username))]);
        if ($cek->rowCount() > 0) {
            return false; // Username kembar ditolak
        }

        // Enkripsi kata sandi dengan algoritma Bcrypt 60 karakter
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Simpan data aman ke tabel users
        $query = "INSERT INTO " . $this->table_name . " (nama, username, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            trim($nama),
            strtolower(trim($username)),
            $password_hash,
            $role
        ]);
    }

    // 2. Verifikasi Kredensial Login Pengguna
    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([strtolower(trim($username))]);
        $user = $stmt->fetch();

        // Cocokkan password yang diketik dengan hash tersimpan di database
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Password cocok, login sah
        }
        return false; // Password salah atau username tidak ditemukan
    }
}
?>