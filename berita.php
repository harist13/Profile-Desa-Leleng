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
      <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Berita Desa</h1>
          <!-- <h2>“Bersih, Asri, Damai, Adil dan Tenteram – (BERADAT)”.</h2> -->
           <p></p>
           <p></p>
        </div>
      </div>
      <div class="text-center">
        <!-- <a href="tentang.php" class="btn-get-started scrollto">Mulai</a> -->
      </div>

      

    </div>
  </section><!-- End Hero -->


<!-- ======= News Section ======= -->
<section id="news" class="news section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Berita Terbaru</h2>
      <p>Berita terbaru dari Desa Leleng yang informatif dan terpercaya.</p>
    </div>

    <div class="row">
      <?php
      // Fetch all news data from the database
      $result = $conn->query("SELECT berita.*, admin.nama AS admin_nama FROM berita LEFT JOIN admin ON berita.admin_id = admin.id ORDER BY berita.id DESC");
      while ($row = $result->fetch_assoc()) {
          echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch">';
          echo '  <div class="card">';
          echo '    <img src="admin/uploads/' . htmlspecialchars($row['gambar']) . '" class="card-img-top" alt="' . htmlspecialchars($row['judul']) . '">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title"><a href="detailberita.php?id=' . $row['id'] . '">' . htmlspecialchars($row['judul']) . '</a></h5>';
          echo '      <p class="card-text">' . substr(htmlspecialchars($row['deskripsi']), 0, 100) . '...</p>';
          echo '      <div class="read-more"><a href="detailberita.php?id=' . $row['id'] . '"><i class="bi bi-arrow-right"></i> Selengkapnya</a></div>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
      }
      ?>
    </div>

  </div>
</section><!-- End News Section -->


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

</body>

</html>