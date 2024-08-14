<?php
include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $admin_id = $_POST['admin_id'];

    // Handle file upload
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);

    // Move uploaded file to the target directory
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Prepare the SQL query
        $sql = "INSERT INTO galeri (judul, gambar, kategori, lokasi, deskripsi, admin_id) 
                VALUES ('$judul', '$gambar', '$kategori', '$lokasi', '$deskripsi', '$admin_id')";

        if ($conn->query($sql) === TRUE) {
            header("Location: galeri.php?status=success");
        } else {
            header("Location: galeri.php?status=error");
        }
    } else {
        header("Location: galeri.php?status=error");
    }
}
?>
