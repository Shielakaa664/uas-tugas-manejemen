<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $actions = $_POST['actions'];

    $query = "INSERT INTO konten (Title, Description, `Due Date`, Actions) VALUES ('$title', '$description', '$due_date', '$actions')";
    if ($conn->query($query)) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Data</title>
</head>
<body>
    <h1>Tambah Data Baru</h1>
    <form method="POST">
        <label>Judul</label>
        <input type="text" name="title" required>
        <label>Deskripsi</label>
        <textarea name="description" required></textarea>
        <label>Tanggal</label>
        <input type="date" name="due_date" required>
        <label>Aksi</label>
        <input type="text" name="actions" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
