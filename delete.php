<?php
$mysqli = new mysqli('localhost', 'root', '', 'myapp');
if ($mysqli->connect_errno) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

if (!isset($_GET['id'])) {
    die("ID user tidak ditemukan.");
}

$id = (int)$_GET['id'];
$mysqli->query("DELETE FROM users WHERE id=$id");
header("Location: table.php");
exit;
