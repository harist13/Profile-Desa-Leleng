<?php
include '../config.php';
session_start();
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
    <h2>Tambah Galeri</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>galeri berhasil ditambahkan.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, galeri gagal ditambahkan.</p>";
        }
    }
    ?>

   <form action="tambah_galeri.php" method="POST" enctype="multipart/form-data">

   <div class="form-group">
        <label for="kategori">Judul:</label>
        <input type="text" id="judul" name="judul" placeholder="Masukkan judul" required>
    </div>


    <div class="form-group">
        <label for="gambar">Gambar:</label>
        <input type="file" id="gambar" name="gambar" required>
    </div>

    <div class="form-group">
        <label for="kategori">Kategori:</label>
        <input type="text" id="kategori" name="kategori" placeholder="Masukkan kategori" required>
    </div>

    <div class="form-group">
        <label for="lokasi">Lokasi:</label>
        <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi" required>
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
        <button type="submit">Tambah Galeri</button>
    </div>
</form>

</div>

<br>
<?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'berhasil");') {
            echo "<p style='color: green; text-align: center;'>galeri berhasil diperbarui.</p>";
        } elseif ($_GET['status'] == 'gagal') {
            echo "<p style='color: red;'>Terjadi kesalahan, galeri gagal diperbarui.</p>";
        }
    }
    ?>
<div class="container">
    <h2>Data Galeri</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>judul</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all gallery data from the database
            $result = $conn->query("SELECT galeri.*, admin.nama AS admin_nama FROM galeri LEFT JOIN admin ON galeri.admin_id = admin.id");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['gambar']) . "' alt='Gambar' width='100'></td>";
                echo "<td>" . htmlspecialchars($row['kategori']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lokasi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['admin_nama']) . "</td>";
                echo "<td>
                        <a href='edit_galeri.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_galeri.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus galeri ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

