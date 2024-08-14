<?php
include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gambar = $_FILES['gambar']['name'];

    // Upload gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if($check !== false) {
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("Location: tim_staff.php?status=error_upload");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Insert data into the database
            $sql = "INSERT INTO tim_staff (nama, jabatan, gambar) VALUES ('$nama', '$jabatan', '$gambar')";

            if ($conn->query($sql) === TRUE) {
                header("Location: tim_staff.php?status=success");
            } else {
                header("Location: tim_staff.php?status=error");
            }
        } else {
            header("Location: tim_staff.php?status=error_upload");
        }
    }
}
?>

<?php
include 'navbar.php';
?>

<br>
<div class="container">
   <br>
 <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p style='color: green; text-align: center;'>Data tim_staff berhasil ditambahkan.</p>";
        } elseif ($_GET['status'] == 'error') {
            echo "<p style='color: red;'>Terjadi kesalahan, data tim_staff gagal ditambahkan.</p>";
        } elseif ($_GET['status'] == 'error_upload') {
            echo "<p style='color: red;'>Terjadi kesalahan saat mengunggah gambar.</p>";
        }
    }

    // Menampilkan pesan jika data tim_staff berhasil dihapus
    if (isset($_GET['status']) && $_GET['status'] == 'deleted') {
        echo "<p style='color: green; text-align: center;'>Data tim_staff berhasil dihapus.</p>";
    }
    ?>


    <h2>Tambah Data tim_staff</h2>
    
    <!-- Display success or error message -->
   
    <form action="tim_staff.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan:</label>
            <input type="text" id="jabatan" name="jabatan" placeholder="Masukkan jabatan" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" required>
        </div>

        <div class="form-group">
            <button type="submit">Tambah Data tim_staff</button>
        </div>
    </form>
</div>

<br>

<div class="container">
    <h2>Data tim_staff</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all tim_staff data from the database
            $result = $conn->query("SELECT * FROM tim_staff");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['jabatan']) . "</td>";
                echo "<td><img src='uploads/" . htmlspecialchars($row['gambar']) . "' alt='" . htmlspecialchars($row['nama']) . "' style='width:100px;'></td>";
                echo "<td>
                        <a href='edit_tim_staff.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_tim_staff.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus tim_staff ini?\");'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
