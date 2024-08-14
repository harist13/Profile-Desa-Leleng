<?php
include '../config.php';
session_start();

// Get the ID of the tim_staff to be deleted
$id = $_GET['id'];

// Fetch the image file name to delete from the server
$result = $conn->query("SELECT gambar FROM tim_staff WHERE id = '$id'");
$staff = $result->fetch_assoc();

// Delete the record from the database
$sql = "DELETE FROM tim_staff WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    // Delete the image file from the server
    if (file_exists("uploads/" . $staff['gambar'])) {
        unlink("uploads/" . $staff['gambar']);
    }
    header("Location: tim_staff.php?status=deleted");
} else {
    header("Location: tim_staff.php?status=error_delete");
}
?>
