<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $jumlah_penduduk = intval($_POST['jumlah_penduduk']);
    $kepala_keluarga = $conn->real_escape_string($_POST['kepala_keluarga']);
    $admin_id = intval($_POST['admin_id']);

    // Insert the new information into the database
    $sql = "INSERT INTO tentang (deskripsi, jumlah_penduduk, kepala_keluarga, admin_id) VALUES ('$deskripsi', $jumlah_penduduk, '$kepala_keluarga', $admin_id)";

    if ($conn->query($sql) === TRUE) {
        header("Location: tentang.php?status=success");
    } else {
        header("Location: tentang.php?status=error");
    }
    exit();
}
?>
