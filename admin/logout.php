<?php
session_start(); // Memulai session

// Mengakhiri semua session
session_unset();
session_destroy();

// Mengarahkan kembali ke halaman login
header("Location: ../login.php");
exit();
?>
