<?php
class SecurityHelper {
    public static function generateCsrfToken() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public static function validateCsrfToken($token) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['csrf_token']) || empty($token)) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    public static function validateAndUploadImage($file, $targetDir, $maxBytes = 2097152) {
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        if ($file['size'] > $maxBytes) {
            throw new Exception("Ukuran gambar melebihi batas maksimal 2MB.");
        }

        $allowedMimes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp'
        ];

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime  = $finfo->file($file['tmp_name']);

        if (!array_key_exists($mime, $allowedMimes)) {
            throw new Exception("Format berkas harus gambar valid (JPG, PNG, atau WEBP).");
        }

        $extension   = $allowedMimes[$mime];
        $newFileName = 'prod_' . time() . '_' . rand(1000, 9999) . '.' . $extension;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $destination = rtrim($targetDir, '/') . '/' . $newFileName;
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            throw new Exception("Gagal menyimpan berkas ke direktori server.");
        }

        return $newFileName;
    }
}
?>