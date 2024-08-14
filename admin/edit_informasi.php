<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize user input
    $id = intval($_POST['id']);
    $deskripsi = $conn->real_escape_string($_POST['deskripsi']);
    $jumlah_penduduk = intval($_POST['jumlah_penduduk']);
    $kepala_keluarga = $conn->real_escape_string($_POST['kepala_keluarga']);
    $admin_id = intval($_POST['admin_id']);

    // Update the informasi record in the database
    $sql = "UPDATE tentang SET deskripsi='$deskripsi', jumlah_penduduk=$jumlah_penduduk, kepala_keluarga='$kepala_keluarga', admin_id=$admin_id WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: tentang.php?status=update_success");
    } else {
        header("Location: tentang.php?status=update_error");
    }
    exit();
}

// Retrieve existing data for editing
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM tentang WHERE id=$id");
    $info = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Informasi</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h2>Edit Informasi</h2>

        <!-- Display success or error message -->
      
        <form action="edit_informasi.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($info['id']); ?>">

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" required><?php echo htmlspecialchars($info['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="jumlah_penduduk">Jumlah Penduduk:</label>
                <input type="number" id="jumlah_penduduk" name="jumlah_penduduk" placeholder="Masukkan jumlah penduduk" value="<?php echo htmlspecialchars($info['jumlah_penduduk']); ?>" required>
            </div>
          
            <div class="form-group">
                <label for="kepala_keluarga">Kepala Keluarga:</label>
                <input type="text" id="kepala_keluarga" name="kepala_keluarga" placeholder="Masukkan kepala keluarga" value="<?php echo htmlspecialchars($info['kepala_keluarga']); ?>" required>
            </div>

            <div class="form-group">
                <label for="admin_id">Admin:</label>
                <select id="admin_id" name="admin_id" required>
                    <?php
                    // Fetch all admins for the dropdown
                    $admins = $conn->query("SELECT id, nama FROM admin");
                    while ($admin = $admins->fetch_assoc()) {
                        // Check if this admin is selected
                        $selected = ($admin['id'] == $info['admin_id']) ? 'selected' : '';
                        echo "<option value='" . $admin['id'] . "' $selected>" . $admin['nama'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit">Update Informasi</button>
            </div>
        </form>
    </div>
</body>
</html>
