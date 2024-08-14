<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deskripsi = $_POST['deskripsi'];
    $admin_id = $_POST['admin_id'];

    // Handle file upload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($gambar);

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_file)) {
            // Insert data into the database
            $stmt = $conn->prepare("INSERT INTO beranda (gambar, deskripsi, admin_id) VALUES (?, ?, ?)");
            $stmt->bind_param('ssi', $gambar, $deskripsi, $admin_id);

            if ($stmt->execute()) {
                header("Location: beranda.php?status=success");
            } else {
                header("Location: beranda.php?status=error");
            }

            $stmt->close();
        } else {
            header("Location: beranda.php?status=error");
        }
    } else {
        header("Location: beranda.php?status=error");
    }

    $conn->close();
}
?>
