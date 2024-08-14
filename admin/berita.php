<?php
include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $admin_id = $_POST['admin_id'];

    // Handle image upload
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
        // Insert data into the database
        $sql = "INSERT INTO berita (gambar, judul, deskripsi, admin_id) VALUES ('$gambar', '$judul', '$deskripsi', '$admin_id')";

        if ($conn->query($sql) === TRUE) {
            header("Location: berita.php?status=success");
        } else {
            header("Location: berita.php?status=error");
        }
    } else {
        header("Location: berita.php?status=error");
    }
}
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
    <h2>Tambah berita</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>berita berhasil ditambahkan.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, berita gagal ditambahkan.</p>";
        }
    }
    ?>
    <?php
    // Tambahkan ini di bagian atas file setelah pengecekan status `success` dan `error`
if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
    echo "<p style='color: green; text-align: center;'>Berita berhasil dihapus.</p>";
}

?>

   <form action="berita.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="gambar">Gambar:</label>
        <input type="file" id="gambar" name="gambar" required>
    </div>

    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" placeholder="Masukkan judul" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
    </div>

    <div class="form-group">
        <label for="admin_id">Admin:</label>
        <select id="admin_id" name="admin_id" required>
            <?php
            // Fetch all admins for the dropdown
            $admins = $conn->query("SELECT id, nama FROM admin");
            while ($admin = $admins->fetch_assoc()) {
                echo "<option value='" . $admin['id'] . "'>" . $admin['nama'] . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <button type="submit">Tambah berita</button>
    </div>
</form>

</div>

<br>

<div class="container">
    <h2>Data berita</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all gallery data from the database
            $result = $conn->query("SELECT berita.*, admin.nama AS admin_nama FROM berita LEFT JOIN admin ON berita.admin_id = admin.id");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['gambar']) . "' alt='Gambar' width='100'></td>";
                echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['admin_nama']) . "</td>";
                echo "<td>
                        <a href='edit_berita.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_berita.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus berita ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
