<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <img src="assets/img/logo/logo_kutaibarat.png" class="logo" alt="">
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

<main id="main">
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
      <br>
      <br>  

      <div class="section-title">
        <h2>Galeri Leleng</h2>
        <br>
        <p>Selamat datang di galeri kegiatan Desa Leleng! Di sini, 
          Anda akan menemukan momen-momen berharga dari desa kami yang terletak di Kabupaten Kutai Barat. 
          Dikelilingi oleh keindahan alam yang memukau, Desa Leleng menawarkan pemandangan menakjubkan dan suasana menenangkan. 
          Jelajahi galeri ini dan rasakan pesona yang menjadikan desa kami sempurna untuk Anda kunjungi.</p>
      </div>

      <br>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">
        <?php
        include 'config.php';
        $result = $conn->query("SELECT * FROM galeri");
        while ($row = $result->fetch_assoc()) {
          echo '<div class="col-lg-4 col-md-6 portfolio-item filter-' . strtolower($row['kategori']) . '">';
          echo '<div class="portfolio-wrap">';
          echo '<img src="admin/uploads/' . htmlspecialchars($row['gambar']) . '" class="img-fluid" alt="' . htmlspecialchars($row['judul']) . '">';
          echo '<div class="portfolio-info">';
          echo '<h4>' . htmlspecialchars($row['judul']) . '</h4>';
          echo '<p>' . htmlspecialchars($row['kategori']) . '</p>';
          echo '<div class="portfolio-links">';
        
          echo '<a href="#" class="portfolio-details" data-id="' . $row['id'] . '" title="More Details"><i class="bx bx-link"></i></a>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- Modal for Portfolio Details -->
  <div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="portfolioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="portfolioModalLabel"></h5>
          
        </div>
        <div class="modal-body">
          <img src="" alt="" class="img-fluid mb-3" id="modalImage">
          <p><strong>Kategori:</strong> <span id="modalKategori"></span></p>
          <p><strong>Lokasi:</strong> <span id="modalLokasi"></span></p>
          <p><strong>Deskripsi:</strong> <span id="modalDeskripsi"></span></p>
        </div>
      </div>
    </div>
  </div>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
  $('.portfolio-details').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
      url: 'get_gallery_details.php',
      type: 'GET',
      data: {id: id},
      dataType: 'json',
      success: function(data) {
        $('#portfolioModalLabel').text(data.judul);
        $('#modalImage').attr('src', 'admin/uploads/' + data.gambar);
        $('#modalKategori').text(data.kategori);
        $('#modalLokasi').text(data.lokasi);
        $('#modalDeskripsi').text(data.deskripsi);
        $('#portfolioModal').modal('show');
      }
    });
  });
});
</script>

</body>

</html>