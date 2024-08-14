<?php
include 'config.php';

// Fetch data from the database
$query = "SELECT * FROM tentang ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

// Check if there's any data
if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    $data = null;
}
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
<style>
    .test {
        padding-left: 90px;
    }

</style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <img src="assets/img/logo/logo_kutaibarat.png" class="logo" alt="">
      <h1 class="logo"><a href="index.php">Kutai Barat</a></h1>
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

  <br>
  <br>
  <br>
  

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Leleng</h2>
          <!-- <p>“Bersih, Asri, Damai, Adil dan Tenteram – (BERADAT)”.</p> -->
        </div>
        
        
     <div class="row content">
  <div class="col-lg-11">
    <p class="test">
      <?php 
      if ($data && isset($data['deskripsi'])) {
          echo htmlspecialchars($data['deskripsi']);
      } else {
          echo "Tidak ada deskripsi tersedia.";
      }
      ?>
    </p>
  </div>
</div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row justify-content-end">

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo ($data && isset($data['jumlah_penduduk'])) ? $data['jumlah_penduduk'] : 0; ?>" data-purecounter-duration="2" class="purecounter"></span>
          <p>Jumlah Penduduk</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
               <span data-purecounter-start="0" data-purecounter-end="<?php echo ($data && isset($data['kepala_keluarga'])) ? $data['kepala_keluarga'] : 0; ?>" data-purecounter-duration="2" class="purecounter"></span>
          <p>Kepala Keluarga</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="2" class="purecounter"></span> -->
              <!-- <p>Kecamatan</p> -->
            </div>
          </div>

          <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <!-- <span data-purecounter-start="0" data-purecounter-end="205" data-purecounter-duration="2" class="purecounter"></span> -->
              <!-- <p>Desa</p> -->
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->



    

  </main><!-- End #main -->

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