<?php
include '../config.php';
session_start();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: beranda.php?status=error");
    exit();
}

$id = intval($_GET['id']);

// Fetch existing data
$stmt = $conn->prepare("SELECT * FROM beranda WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("Location: beranda.php?status=error");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deskripsi = $_POST['deskripsi'];
    $admin_id = $_POST['admin_id'];

    $gambar = $row['gambar']; // Default to existing image

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = $_FILES['gambar']['name'];
        $upload_dir = 'uploads/';
        $upload_file = $upload_dir . basename($gambar);

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_file)) {
            // Remove old image if needed
            // unlink($upload_dir . $row['gambar']);
        } else {
            $gambar = $row['gambar']; // Revert to old image on failure
        }
    }

    // Update data in the database
    $stmt = $conn->prepare("UPDATE beranda SET gambar = ?, deskripsi = ?, admin_id = ? WHERE id = ?");
    $stmt->bind_param('ssii', $gambar, $deskripsi, $admin_id, $id);

    if ($stmt->execute()) {
        header("Location: beranda.php?status=success");
    } else {
        header("Location: beranda.php?status=error");
    }

    $stmt->close();
}
?>

<?php include 'navbar.php'; ?>

<div class="container">
    <h2>Edit Beranda</h2>
    <form action="edit_beranda.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">
            <p><img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar" style="width: 100px; height: auto;"></p>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="admin_id">Admin:</label>
            <select id="admin_id" name="admin_id" required>
                <?php
                // Fetch all admins for the dropdown
                $admins = $conn->query("SELECT id, nama FROM admin");
                while ($admin = $admins->fetch_assoc()) {
                    $selected = ($admin['id'] == $row['admin_id']) ? 'selected' : '';
                    echo "<option value='" . $admin['id'] . "' $selected>" . $admin['nama'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <button type="submit">Update Beranda</button>
        </div>
    </form>
</div>
