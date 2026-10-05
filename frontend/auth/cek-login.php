<?php
session_start();
if (!isset($_SESSION['user'])) {
 header('Location: login.php');
 exit;
}
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport"
 content="width=device-width, initial-scale=1">
 <title>Login Berhasil - KantinKu</title>
</head>
<body>
 <h1>Login berhasil</h1>
 <p>Halo,
 <?= htmlspecialchars($user['nama'], ENT_QUOTES, 'UTF-8'); ?>!
 </p>
 <p>Username:
 <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>
 </p>
 <p>Role:
 <?= htmlspecialchars($user['role'], ENT_QUOTES, 'UTF-8'); ?>
 </p>
 <form action="../../backend/auth/logout.php" method="POST">
 <button type="submit">Keluar</button>
 </form>
</body>
</html>
