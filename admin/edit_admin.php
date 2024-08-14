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

// Retrieve admin details for the form
$admin = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM admin WHERE id=$id");
    $admin = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $nama = $conn->real_escape_string($_POST['nama']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Encrypt the password using MD5
    $password = md5($password);

    // Update the admin's information in the database
    $sql = "UPDATE admin SET nama='$nama', username='$username', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to the register page with a success message
        header("Location: register.php?status=update_success");
        exit();
    } else {
        // Redirect back to the register page with an error message
        header("Location: register.php?status=update_error");
        exit();
    }
}
?>

<?php
include 'navbar.php';
?>
<br>
<div class="container">
    <h2>Edit Admin</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'update_success') {
            echo "<p style='color: green; text-align: center;'>Admin berhasil diperbarui.</p>";
        } elseif ($_GET['status'] == 'update_error') {
            echo "<p style='color: red;'>Terjadi kesalahan, admin gagal diperbarui.</p>";
        }
    }
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($admin['nama']); ?>" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($admin['username']); ?>" required>
        </div>
      
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password baru" required>
        </div>
        
        <div class="form-group">
            <button type="submit">Simpan Perubahan</button>
        </div>
    </form>
</div>
