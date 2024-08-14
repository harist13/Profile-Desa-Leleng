<?php
include '../config.php';
session_start();

$id = $_GET['id'];

// Hapus data dari database
$sql = "DELETE FROM berita WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: berita.php?status=deleted");
} else {
    header("Location: berita.php?status=error");
}
?>
