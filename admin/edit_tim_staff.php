<?php
include '../config.php';
session_start();

// Get the ID of the tim_staff to be edited
$id = $_GET['id'];

// Fetch existing data based on the ID
$result = $conn->query("SELECT * FROM tim_staff WHERE id = '$id'");
$staff = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gambar = $_FILES['gambar']['name'];

    // Check if a new image was uploaded
    if ($gambar != "") {
        // Upload new image
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["gambar"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
            // Update the database with the new image
            $sql = "UPDATE tim_staff SET nama='$nama', jabatan='$jabatan', gambar='$gambar' WHERE id='$id'";
        } else {
            header("Location: edit_tim_staff.php?id=$id&status=error_upload");
            exit();
        }
    } else {
        // If no new image, update without changing the image
        $sql = "UPDATE tim_staff SET nama='$nama', jabatan='$jabatan' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: tim_staff.php?status=success_edit");
    } else {
        header("Location: edit_tim_staff.php?id=$id&status=error");
    }
}
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
    <h2>Edit Data tim_staff</h2>
    
    <!-- Display success or error message -->
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, data tim_staff gagal diperbarui.</p>";
        } elseif ($_GET['status'] == 'error_upload') {
            echo "<p style='color: red;'>Terjadi kesalahan saat mengunggah gambar.</p>";
        }
    }
    ?>

    <form action="edit_tim_staff.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($staff['nama']); ?>" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" value="<?php echo htmlspecialchars($staff['jabatan']); ?>" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar">
            <br>
            <img src="uploads/<?php echo htmlspecialchars($staff['gambar']); ?>" alt="<?php echo htmlspecialchars($staff['nama']); ?>" style="width:100px;">
        </div>

        <div class="form-group">
            <button type="submit">Perbarui Data tim_staff</button>
        </div>
    </form>
</div>
