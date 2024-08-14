<?php
include '../config.php';
session_start();

// Handle the registration form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $nama = $conn->real_escape_string($_POST['nama']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Encrypt the password using MD5
    $password = md5($password);

    // Check if the username already exists
    $checkUsername = $conn->query("SELECT * FROM admin WHERE username='$username'");
    if ($checkUsername->num_rows > 0) {
        header("Location: register.php?status=username_exists");
        exit();
    }

    // Insert the new admin into the database
    $sql = "INSERT INTO admin (nama, username, password) VALUES ('$nama', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: register.php?status=success");
        exit();
    } else {
        header("Location: register.php?status=error");
        exit();
    }
}
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
    <h2>Register Admin</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>Admin berhasil didaftarkan.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, admin gagal didaftarkan.</p>";
        } elseif ($_GET['status'] == 'username_exists') {
            echo "<p style='color: red;'>Username sudah ada, silakan pilih username lain.</p>";
        } elseif ($_GET['status'] == 'update_success') {
            echo "<p style='color: green; text-align: center;'>Admin berhasil diperbarui.</p>";
        } elseif ($_GET['status'] == 'update_error') {
            echo "<p style='color: red;'>Terjadi kesalahan, admin gagal diperbarui.</p>";
        } elseif ($_GET['status'] == 'delete_success') {
            echo "<p style='color: green; text-align: center;'>Admin berhasil dihapus.</p>";
        } elseif ($_GET['status'] == 'delete_error') {
            echo "<p style='color: red;'>Terjadi kesalahan, admin gagal dihapus.</p>";
        }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>
      
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        
        <div class="form-group">
            <button type="submit">Daftarkan Admin</button>
        </div>
    </form>
</div>

<br>

<div class="container">
    <h2>Daftar Admin</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all admin data from the database
            $result = $conn->query("SELECT * FROM admin");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>
                        <a href='edit_admin.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_admin.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus admin ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
