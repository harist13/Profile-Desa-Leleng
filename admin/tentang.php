<?php
include '../config.php';
session_start();
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
     <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>tentang berhasil ditambahkan.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, tentang gagal ditambahkan.</p>";
        }
    }
    ?>
      <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'update_success') {
                echo "<p style='color: green; text-align: center;'>Informasi berhasil diperbarui.</p>";
            } elseif ($_GET['status'] == 'update_error') {
                echo "<p style='color: red;'>Terjadi kesalahan, informasi gagal diperbarui.</p>";
            }
        }
        ?>
<br>
    <h2>Tambah Informasi</h2>
    
   
    

    <form action="tambah_informasi.php" method="POST">
        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
        </div>

        <div class="form-group">
            <label for="jumlah_penduduk">Jumlah Penduduk:</label>
            <input type="number" id="jumlah_penduduk" name="jumlah_penduduk" placeholder="Masukkan jumlah penduduk" required>
        </div>
      
        <div class="form-group">
            <label for="kepala_keluarga">Kepala Keluarga:</label>
            <input type="text" id="kepala_keluarga" name="kepala_keluarga" placeholder="Masukkan kepala keluarga" required>
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
            <button type="submit">Tambah Informasi</button>
        </div>
    </form>
</div>

<br>

<div class="container">
    <h2>Data Informasi</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Jumlah Penduduk</th>
                <th>Kepala Keluarga</th>
                <th>Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all tentang data from the database
            $result = $conn->query("SELECT tentang.*, admin.nama AS admin_nama FROM tentang LEFT JOIN admin ON tentang.admin_id = admin.id");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['deskripsi']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jumlah_penduduk']) . "</td>";
                echo "<td>" . htmlspecialchars($row['kepala_keluarga']) . "</td>";
                echo "<td>" . htmlspecialchars($row['admin_nama']) . "</td>";
                echo "<td>
                        <a href='edit_informasi.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_informasi.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus tentang ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
