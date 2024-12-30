<?php
include 'db.php';

$id = $_GET['id'];
$query = "SELECT * FROM konten WHERE ID = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $actions = $_POST['actions'];

    $query = "UPDATE konten SET Title='$title', Description='$description', `Due Date`='$due_date', Actions='$actions' WHERE ID=$id";
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
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <form method="POST">
        <label>Judul</label>
        <input type="text" name="title" value="<?= htmlspecialchars($data['Title']) ?>" required>
        <label>Deskripsi</label>
        <textarea name="description" required><?= htmlspecialchars($data['Description']) ?></textarea>
        <label>Tanggal</label>
        <input type="date" name="due_date" value="<?= $data['Due Date'] ?>" required>
        <label>Aksi</label>
        <input type="text" name="actions" value="<?= htmlspecialchars($data['Actions']) ?>" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
