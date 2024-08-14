<?php
include '../config.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

// Get the current user's username
$username = $_SESSION['username'];

// Fetch the user's current profile information
$sql = "SELECT nama, password FROM admin WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentNama = $row['nama'];
    $currentPassword = $row['password']; // Note: This is the hashed password
} else {
    // Handle the case where user data is not found
    $currentNama = "";
    $currentPassword = "";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ... (rest of the POST handling code remains the same)
}
?>

<?php
include 'navbar.php';
?>
<br>
 <h1 align="center">Selamat datang, <?php echo htmlspecialchars($currentNama); ?>!</h1>
<div class="container">
    <h2>Profile</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>Profil berhasil diperbarui.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, profil gagal diperbarui.</p>";
        }
    }
    ?>

    <form action="profile.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="<?php echo htmlspecialchars($currentNama); ?>" required>
        </div>
      
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password baru (kosongkan jika tidak ingin mengubah)" >
        </div>
        
        <div class="form-group">
            <button type="submit">Simpan Perubahan</button>
        </div>
    </form>
</div>