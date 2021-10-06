<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ secure_asset('presento/img/favicon.png') }}" rel="icon">
  <link href="{{ secure_asset('presento/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ secure_asset('presento/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('presento/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('presento/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('presento/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('presento/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('presento/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ secure_asset('presento/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ secure_asset('presento/css/style.css') }}" rel="stylesheet">
  @stack('page_css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="{{ url('/') }}">FREELANCERS CONSULTING<span>.</span></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>

          <li><a class="nav-link scrollto" href="{{ url('/') }}#services">Serviços</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/') }}#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


      @guest()
      <a href="{{ route('register') }}" class="get-started-btn">REGISTAR-SE</a>
      @endguest


      @auth()
      <a href="{{ route('profile.edit') }}" class="get-started-btn scrollto">PERFIL</a>
      @endauth

      @guest() 
      <a href="{{ route('login') }}" class="get-started-btn">LOGIN</a>
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
            <p>FreeLancers Consulting é uma organição que tem objectivo de resgatar ou dar a oportunidade aos novos talentos e empresas se conectarem de maneira fácil e fluida.</p>
            <br>
            <p>
              Bairro do Prenda <br>
              Luanda, Angola<br><br>
              <strong>Telefone:</strong> +244 934 612 659<br>
              <strong>E-mail:</strong> geral@freelancersconsulting<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Empresas</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ver Área da Empresa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Publicar Anúncio de Emprego</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Soluções Para Empresas</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contacte-nos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Sobŕe Nós</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Termos de Serviços</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politica de Privacidade</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Ajuda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politica de Protecção de Dados</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Nosso Newsletter Semanal</h4>
            <p>Subscreva ao nosso Newsletter semanal e fique a par de todas as novidades.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscrever">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Direitos Reservados <strong><span>Freelancers Consulting</span></strong>.
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
  <script src="{{ secure_asset('presento/vendor/aos/aos.js') }}"></script>
  <script src="{{ secure_asset('presento/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ secure_asset('presento/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ secure_asset('presento/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ secure_asset('presento/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ secure_asset('presento/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ secure_asset('presento/js/main.js') }}"></script>
  @stack('page_js')
</body>

</html>