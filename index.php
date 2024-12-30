<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM konten WHERE Title LIKE '%$search%' ORDER BY ID ASC";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <title>Manajemen Konten</title>
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="lalak.png" alt="profile_picture">
                <h3>Siti Nurlela</h3>
                <p>Programmer</p>
            </div>
            <ul>
                <li><a href="#" class="active"><span class="icon"><i class="fas fa-home"></i></span><span class="item">Home</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-desktop"></i></span><span class="item">My Dashboard</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-user-friends"></i></span><span class="item">People</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-tachometer-alt"></i></span><span class="item">Performance</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-database"></i></span><span class="item">Development</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-chart-line"></i></span><span class="item">Reports</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-user-shield"></i></span><span class="item">Admin</span></a></li>
                <li><a href="#"><span class="icon"><i class="fas fa-cog"></i></span><span class="item">Settings</span></a></li>
            </ul>
        </div>
    </div>

 <div class="card-container">   
        <h1>Manajemen Konten</h1>
        <form method="GET">
            <input type="text" name="search" placeholder="Cari Judul..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Cari</button>       
        </form>
        <div class="tambah">
            <a href="create.php" class="tambah">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['ID'] ?></td>
                        <td><?= htmlspecialchars($row['Title']) ?></td>
                        <td><?= htmlspecialchars($row['Description']) ?></td>
                        <td><?= $row['Due Date'] ?></td>
                        <td class="tombol">
                            <a href="update.php?id=<?= $row['ID'] ?>">Edit</a>
                            <a href="delete.php?id=<?= $row['ID'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

