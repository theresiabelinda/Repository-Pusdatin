<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Repository Pusdatin</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assets_frontend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets_frontend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets_frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets_frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets_frontend/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets_frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets_frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assets_frontend/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Feb 22 2025 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">Repository Pusdatin</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <!-- <li><a href="#about">Repository</a></li> -->
          <li><a href="#faq-2">FAQ</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('auth.index') }}">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>Pusat Data & Informasi (PUSDATIN)</h1>
            <p>Pusat Penyimpanan Data Digital STTII Yogyakarta</p>

          <!-- Search Form -->
          @if (!session()->has('izin_search'))
            <form action="{{ route('validasi.nidn') }}" method="POST" class="mb-4">
          @csrf
            <label for="nidn" class="form-label">Masukkan NIDN untuk akses pencarian:</label>
            <div class="d-flex">
              <input type="text" name="nidn" class="form-control me-2" required>
              <button type="submit" class="btn btn-primary">Verifikasi</button>
            </div>
          </form>
          @else
          <form action="{{ route('search') }}" method="GET" class="mb-3">
            <div class="d-flex">
              <input type="text" name="q" class="form-control me-2" placeholder="Masukkan kata kunci pencarian..." required>
              <button type="submit" class="btn btn-success">Cari</button>
            </div>
          </form>

          <a href="{{ route('reset.izin.search') }}" class="btn btn-secondary mt-2">Reset Akses</a>
          @endif

          <!-- Tampilkan notifikasi -->
          @if (session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
          @endif
          @if (session('error'))
            <div class="alert alert-danger mt-2">{{ session('error') }}</div>
          @endif

            <div class="d-flex">
              <a href="{{ route('frontend.sk.form') }}" class="btn-get-started">Tambah Data</a>
              <a class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>

        <!-- Kolom Gambar -->
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{asset('assets_frontend/img/hero-img.png')}}" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->

    <section id="about" class="about section">

    <!-- Section Title -->
    <!-- <div class="container section-title" data-aos="fade-up" id="tentang">
    <h2 class="text-center">Sistem Repository Mahasiswa</h2>
    <p> Berisi skripsi, tesis dan disertasi Sekolah Tinggi Teologi Injili Yogyakarta </p>
    </div>
    <div class="container">
      <div class="row gy-4"> -->
        <!-- Form Search -->
        <!-- <form action="{{ route('repositorimahasiswa.index') }}" method="GET" class="mt-3">
          <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari judul, penulis, tahun..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">
              <i class="bi bi-search"></i> Cari
            </button>
          </div>
        </form>
      </div>
    </div> -->
</div>

    </div>
    
    </section><!-- /About Section -->

    <!-- Call To Action Section -->
    <!-- <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/bg/bg-8.webp" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Unggah Mandiri Tugas Akhir Mahasiswa</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
              Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Self Upload</a>
          </div>
        </div>

      </div>

    </section>/Call To Action Section -->

    <!-- Faq 2 Section -->
    <section id="faq-2" class="faq-2 section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Berikut adalah pertanyaan yang sering diajukan terkait penggunaan dan layanan Repository Pusdatin. 
            Kami harap daftar ini membantu Anda dalam memahami fitur dan akses yang tersedia.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-10">

            <div class="faq-container">

              <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara masuk ke akun admin?</h3>
                <div class="faq-content">
                  <p>Klik button login pada menu halaman utama di pojok kanan atas. 
                    Kemudian halaman akan berpindah, isi email address dan password sesuai dengan akun yang diberikan oleh operator pusdatin.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara submit data ke repository pusdatin?</h3>
                <div class="faq-content">
                  <p>Di halaman utama klik menu "Tambah Data". 
                    Isi semua menu yang diminta, diharapkan tidak ada yang kosong. 
                    Kemudian klik submit data, akan muncul notifikasi bahwa data berhasil atau gagal disimpan. 
                    Untuk kembali, klik button "Kembali ke halaman utama".</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana jika salah submit data?</h3>
                <div class="faq-content">
                  <p>Pihak bersangkutan dapat menghubungi operator pusdatin, admin prodi atau sekretaris</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara mencari data?</h3>
                <div class="faq-content">
                  <p>1. Silahkan input NIDN atau ID akun yang diberikan oleh operator.</p>
                  <p>2. Kemudian klik button verifikasi, nanti akan muncul notifikasi apabila NIDN yang diinputkan benar atau salah.</p>
                  <p>3. Lalu masukan kata kunci pencarian berupa judul atau kategori SK, kemudian klik cari</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq 2 Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Repository Pusdatin</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Kantor Pusat Data dan Informasi</p>
            <p>Jl. Ukrim No.23, Cupuwatu I, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571</p>
            <p class="mt-3"><strong>Phone:</strong> <span>082325619436</span></p>
            <p><strong>Email:</strong> <span>pddikti.pusdatin111@gmail.com/span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="https://sttii-yogyakarta.ac.id">Web STTII Yogyakarta</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://student.sttii-yogyakarta.ac.id">Web SIAKAD </a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://lecturer.sttii-yogyakarta.ac.id">Web SIA Dosen</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="https://ejournal.sttii-yogyakarta.ac.id">Predica Verbum</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Tetap terhubung dan dapatkan informasi terbaru seputar data dan publikasi kami melalui media sosial resmi.</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Repository Pusdatin</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets_frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('assets_frontend/js/main.js')}}"></script>

</body>

</html>