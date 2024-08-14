<?php
include '../config.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

// Check if an ID is provided and sanitize it
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete the admin record from the database
    $sql = "DELETE FROM admin WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: register.php?status=delete_success");
    } else {
        header("Location: register.php?status=delete_error");
    }
} else {
    header("Location: register.php?status=delete_error");
}
exit();
?>
