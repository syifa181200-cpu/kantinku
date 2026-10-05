<?php
class User
{
 private $conn;
 private $table_name = 'users';
 public function __construct($db)
 {
 $this->conn = $db;
 }
 public function isUsernameExists($username)
 {
 $sql = "SELECT id FROM {$this->table_name} " .
 "WHERE username = ? LIMIT 1";
 $stmt = $this->conn->prepare($sql);
 $stmt->execute([strtolower(trim($username))]);
 return $stmt->fetch() !== false;
 }
 public function register($nama, $username, $password,
 $role = 'siswa')
 {
 if ($this->isUsernameExists($username)) {
 return false;
 }
 $hash = password_hash($password, PASSWORD_BCRYPT);
 $sql = "INSERT INTO {$this->table_name} " .
 "(nama, username, password, role) " .
 "VALUES (?, ?, ?, ?)";
 $stmt = $this->conn->prepare($sql);
 return $stmt->execute([
 trim($nama), strtolower(trim($username)),
 $hash, $role,
 ]);
 }
 public function login($username, $password)
 {
 $sql = "SELECT * FROM {$this->table_name} " .
 "WHERE username = ? LIMIT 1";
 $stmt = $this->conn->prepare($sql);
 $stmt->execute([strtolower(trim($username))]);
 $user = $stmt->fetch(PDO::FETCH_ASSOC);
 if (!$user ||
 !password_verify($password, $user['password'])) {
 return false;
 }
 unset($user['password']);
 return $user;
 }
}