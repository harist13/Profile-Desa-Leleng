<?php
include '../config.php';
session_start();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: beranda.php?status=error");
    exit();
}

$id = intval($_GET['id']);

// Fetch existing data
$stmt = $conn->prepare("SELECT gambar FROM beranda WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    $gambar = $row['gambar'];
    // Remove the image file
    $upload_dir = 'uploads/';
    if (file_exists($upload_dir . $gambar)) {
        unlink($upload_dir . $gambar);
    }

    // Delete data from the database
    $stmt = $conn->prepare("DELETE FROM beranda WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: beranda.php?status=success");
    } else {
        header("Location: beranda.php?status=error");
    }

    $stmt->close();
} else {
    header("Location: beranda.php?status=error");
}

$conn->close();
