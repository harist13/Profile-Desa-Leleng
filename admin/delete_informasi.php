<?php
include '../config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM tentang WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: tentang.php?status=delete_success");
    } else {
        header("Location: tentang.php?status=delete_error");
    }
    exit();
} else {
    header("Location: tentang.php?status=delete_error");
}
?>
