<?php
include '../config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the selected gallery item from the database
    $sql = "DELETE FROM galeri WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: galeri.php?status=success");
    } else {
        header("Location: galeri.php?status=error");
    }
}
?>
