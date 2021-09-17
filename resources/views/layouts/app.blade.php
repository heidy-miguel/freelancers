<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('presento/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('presento/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('presento/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('presento/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('presento/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('presento/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('presento/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('presento/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('presento/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('presento/css/style.css') }}" rel="stylesheet">
  @stack('page_css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="{{ route('welcome') }}">FREELANCERS CONSULTING<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
<!--       <a href="{{ route('welcome') }}" class="logo me-auto"><img src="{{ asset('presento/img/logo.png') }}" alt=""></a> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li> -->
          <li><a class="nav-link scrollto" href="{{ route('instructor.explore') }}">Freelancers</a></li>
          <li><a class="nav-link scrollto" href="{{ route('job.index') }}">Oportunidades</a></li>
          <li><a class="nav-link scrollto" href="{{ route('welcome') }}#services">Serviços</a></li>
          <li><a class="nav-link scrollto " href="{{ route('welcome') }}#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="{{ route('welcome') }}#team">Team</a></li>
<!--          <li><a href="#">Blog</a></li>
           <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="{{ route('welcome') }}#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @auth('trainee')
      <a href="{{ url('/instructor/register') }}" class="get-started-btn scrollto">PUBLICAR</a>
      @endauth
      @auth('instructor')
      <a href="{{ url('/instructor/edit') }}" class="get-started-btn scrollto">PERFIL</a>
      @endauth
      @guest('instructor') 
      <a href="{{ url('/instructor/register') }}" class="get-started-btn scrollto">REGISTAR-SE</a>
      @endguest
      @guest('instructor') 
      <a href="{{ url('/instructor/login') }}" class="get-started-btn">LOGIN</a>
      @endguest
    </div>
  </header><!-- End Header -->

  @yield('hero')

  <main id="main">
    @yield('main')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Freelancers Consulting<span>.</span></h3>
            <p>
              Luanda<br>
              Angola<br><br>
              <strong>Telefone:</strong>+244 934 612 659<br>
              <strong>E-mail:</strong> geral@freelancersconsulting<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Clientes</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Como contratar</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketplace de talentos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Formadores</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Como encontrar trabalho</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Direitos reservados <strong><span>Freelancers Consulting</span></strong>.
        </div>
      </div>
      <div class="social-links text-center text-md-end pt-3 pt-md-0">
        <a href="https//twitter.com/freelancersconsulting" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https//facebook.com/freelancersconsulting" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https//instagram.com/freelancersconsulting" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https//linkedin.com/freelancersconsulting" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('presento/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('presento/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('presento/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('presento/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('presento/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('presento/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('presento/js/main.js') }}"></script>
  @stack('page_js')
</body>

</html>