<?php
// ====== Koneksi Database ======
$mysqli = new mysqli('localhost', 'root', '', 'myapp'); // ganti sesuai database
if ($mysqli->connect_errno) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

// Ambil semua user
$result = $mysqli->query("SELECT id, username, created_at FROM users");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center; /* Center konten */
        }
        table {
            margin: 0 auto; /* Center tabel */
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #000;
        }
        a.button {
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #000;
            border-radius: 3px;
            margin: 2px;
        }
        a.edit {
            background-color: #4CAF50;
            color: white;
        }
        a.delete {
            background-color: #f44336;
            color: white;
            
        }
    </style>
</head>
<body>
    <h1>Data User</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Waktu Dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['created_at']) ?></td>
            <td>
                <a class="button edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                <a class="button delete" href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin mau hapus user ini?');">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table><br>
<button class="btn-back" onclick="window.location.href='login.html'">BACK</button>

    <style>
.btn-back {
    background-color: #4CAF50; 
    color: white;             
    padding: 10px 20px;        
    border: none;             
    border-radius: 5px;       
    cursor: pointer;           
    font-size: 16px;           
    transition: all 0.3s ease; 
}

.btn-back:hover {
    background-color: #45a049; 
    transform: scale(1.05);    
}
</style>

    
</body>
</html>
