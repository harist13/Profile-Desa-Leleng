<?php
include '../config.php';
session_start();

$id = $_GET['id'];

// Fetch existing data for the news entry
$result = $conn->query("SELECT * FROM berita WHERE id = $id");
$berita = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $admin_id = $_POST['admin_id'];
    
    $gambar = $_FILES['gambar']['name'];

    if ($gambar) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($gambar);

        // Update with new image
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            $sql = "UPDATE berita SET gambar='$gambar', judul='$judul', deskripsi='$deskripsi', admin_id='$admin_id' WHERE id = $id";
        }
    } else {
        // Update without changing image
        $sql = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi', admin_id='$admin_id' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: berita.php?status=success");
    } else {
        header("Location: berita.php?status=error");
    }
}

include 'navbar.php';
?>

<br>
<div class="container">
    <h2>Edit Berita</h2>
    
    <form action="edit_berita.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
            <p>Current Image: <img src='uploads/<?= htmlspecialchars($berita['gambar']) ?>' alt='Gambar' width='100'></p>
        </div>

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" id="judul" name="judul" value="<?= htmlspecialchars($berita['judul']) ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required><?= htmlspecialchars($berita['deskripsi']) ?></textarea>
        </div>

        <div class="form-group">
            <label for="admin_id">Admin:</label>
            <select id="admin_id" name="admin_id" required>
                <?php
                $admins = $conn->query("SELECT id, nama FROM admin");
                while ($admin = $admins->fetch_assoc()) {
                    $selected = ($admin['id'] == $berita['admin_id']) ? "selected" : "";
                    echo "<option value='" . $admin['id'] . "' $selected>" . $admin['nama'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Update Berita</button>
        </div>
    </form>
</div>
