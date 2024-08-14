<?php
include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kutai Barat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo/logo_kutaibarat.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    #pahlawan {
 
   width: 100%;
  height: 100vh;
  position: relative;
 /* Mengatur gambar latar belakang */
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.swiper-container {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
}

.swiper-slide h2 {
  color: #fff;
  font-size: 48px;
  margin-bottom: 20px;
}

.swiper-slide p {
  color: #fff;
  font-size: 18px;
}

  </style>

  <!-- =======================================================
  * Template Name: OnePage
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <img src="assets/img/logo/logo_kutaibarat.png" class="logo" alt="">
      <h1 class="logo"><a href="index.php">Leleng</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
          <li><a class="nav-link scrollto" href="tentang.php">Tentang</a></li>
          <li><a class="nav-link scrollto o" href="parawisata.php">Galeri</a></li>
          <li><a class="nav-link scrollto o" href="berita.php">Berita</a></li>
          <li><a class="nav-link scrollto o" href="Peta.php">Peta</a></li>
          <li><a class="nav-link scrollto o" href="Team_&_Staff.php">Tim & Staff</a></li>
          <li><a class="nav-link scrollto o" href="login.php">Login</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= pahlawan Section ======= -->
 
<section id="pahlawan">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
      // Fetch all beranda data from the database
      $result = $conn->query("SELECT beranda.*, admin.nama AS admin_nama FROM beranda LEFT JOIN admin ON beranda.admin_id = admin.id");

      while ($row = $result->fetch_assoc()) {
          echo "<div class='swiper-slide' style='background-image: url(admin/uploads/" . htmlspecialchars($row['gambar']) . ");'>";
          echo "<div class='container'>";
          echo "<h2>" . htmlspecialchars($row['deskripsi']) . "</h2>";
          echo "<p>" . htmlspecialchars($row['admin_nama']) . "</p>";
echo "<a href='tentang.php' class='btn btn-primary btn-lg' style='width: 150px; padding: 15px 0;'>Mulai</a>";
          echo "</div>";
          echo "</div>";
      }
      ?>
    </div>
  
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>





  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Leleng</h3>
            <p>
              filadelfia <br>
              Leleng<br>
              Kutai Barat <br><br>
              <strong>Phone:</strong> +628<br>
              <strong>Email:</strong> leleng@gmail.com<br>
            </p>
          </div>

          

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Leleng</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/"></a>
        </div>
      </div>
      
    </div>
  </footer><!-- End Footer -->
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper('.swiper-container', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
});

  </script>

</body>

</html>