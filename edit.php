<?php
$mysqli = new mysqli('localhost', 'root', '', 'myapp');
if ($mysqli->connect_errno) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (!isset($_GET['id'])) {
    die("ID user tidak ditemukan.");
}

$id = (int)$_GET['id'];

// Ambil data user
$result = $mysqli->query("SELECT * FROM users WHERE id = $id");
if ($result->num_rows == 0) {
    die("User tidak ditemukan.");
}

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $mysqli->real_escape_string($_POST['username']);
    $mysqli->query("UPDATE users SET username='$username' WHERE id=$id");
    header("Location: table.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body { text-align: center; font-family: Arial; }
        input { padding: 5px; margin: 5px; }
    </style>
</head>
<body>
    <h1>Edit User</h1>
    <form method="post">
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <br>
    <a href="table.php">Kembali ke Daftar User</a>
</body>
</html>
