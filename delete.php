<?php
include 'db.php';

$id = $_GET['id'];
$query = "DELETE FROM konten WHERE ID = $id";

if ($conn->query($query)) {
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
