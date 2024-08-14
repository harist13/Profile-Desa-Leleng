<?php
include '../config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the selected gallery item
    $result = $conn->query("SELECT * FROM galeri WHERE id = $id");
    $galeri = $result->fetch_assoc();
    
    if (!$galeri) {
        header("Location: tambah_galeri.php?status=gagal");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];
    $admin_id = $_POST['admin_id'];

    // Check if a new image has been uploaded
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($gambar);

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // Update the gallery item with the new image
            $sql = "UPDATE galeri SET judul='$judul', gambar='$gambar', kategori='$kategori', lokasi='$lokasi', deskripsi='$deskripsi', admin_id='$admin_id' WHERE id=$id";
        } else {
            header("Location: galeri.php?id=$id&status=gagal");
            exit();
        }
    } else {
        // Update the gallery item without changing the image
        $sql = "UPDATE galeri SET judul='$judul', kategori='$kategori', lokasi='$lokasi', deskripsi='$deskripsi', admin_id='$admin_id' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: galeri.php?status=berhasil");
    } else {
        header("Location: galeri.php?id=$id&status=gagal");
    }
}
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
    <h2>Edit Galeri</h2>

    <!-- Display berhasil"); or gagal message -->
    

    <form action="edit_galeri.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
            <p>Gambar saat ini: <img src="uploads/<?php echo htmlspecialchars($galeri['gambar']); ?>" alt="Gambar" width="100"></p>
        </div>

         <div class="form-group">
            <label for="kategori">Judul:</label>
            <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($galeri['judul']); ?>" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" value="<?php echo htmlspecialchars($galeri['kategori']); ?>" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo htmlspecialchars($galeri['lokasi']); ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required><?php echo htmlspecialchars($galeri['deskripsi']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="admin_id">Admin:</label>
            <select id="admin_id" name="admin_id" required>
                <?php
                // Fetch all admins for the dropdown
                $admins = $conn->query("SELECT id, nama FROM admin");
                while ($admin = $admins->fetch_assoc()) {
                    $selected = $admin['id'] == $galeri['admin_id'] ? 'selected' : '';
                    echo "<option value='" . $admin['id'] . "' $selected>" . $admin['nama'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Update Galeri</button>
        </div>
    </form>
</div>
