<?php
session_start();

// ====== Koneksi Database ======
$mysqli = new mysqli('localhost', 'root', '', 'myapp'); // ganti sesuai database
if ($mysqli->connect_errno) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// ====== Ambil data dari form ======
$username = trim($_POST['name'] ?? '');
$password = $_POST['password'] ?? '';

// Validasi sederhana
if (empty($username) || empty($password)) {
    die("Username dan password wajib diisi.");
}

// Hash password sebelum simpan
$hash = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param('ss', $username, $hash);
if ($stmt->execute()) {
    $stmt->close();
    // Redirect ke halaman tabel
    header("Location: table.php");
    exit;
} else {
    echo "Gagal menyimpan data: " . $mysqli->error;
}
?>
