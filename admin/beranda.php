<?php
include '../config.php';
session_start();
?>

<?php
include 'navbar.php';
?>



<br>
<div class="container">
    <h2>Tambah Informasi</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>Operasi berhasil dilakukan.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan.</p>";
        } elseif ($_GET['status'] == 'error_upload') {
            echo "<p style='color: red;'>Terjadi kesalahan saat mengunggah gambar.</p>";
        }
    }

    

    // Menampilkan pesan jika data tim_staff berhasil dihapus
    if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
        echo "<p style='color: green; text-align: center;'>Data tim_staff berhasil dihapus.</p>";
    }
    ?>

   <form action="tambah_beranda.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="gambar">Gambar:</label>
        <input type="file" id="gambar" name="gambar" accept="image/*" required>
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
        <button type="submit">Tambah Beranda</button>
    </div>
</form>

</div>

<br>

<div class="container">
    <h2>Data Beranda</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all beranda data from the database
            $result = $conn->query("SELECT beranda.*, admin.nama AS admin_nama FROM beranda LEFT JOIN admin ON beranda.admin_id = admin.id");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['gambar']) . "' alt='Gambar' style='width: 100px; height: auto;'></td>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['admin_nama']) . "</td>";
                echo "<td>
                        <a href='edit_beranda.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_beranda.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus beranda ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

