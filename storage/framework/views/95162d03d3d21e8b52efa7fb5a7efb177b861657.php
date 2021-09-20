<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo e(asset('presento/img/favicon.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('presento/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('presento/vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('presento/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('presento/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('presento/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('presento/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('presento/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('presento/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo e(asset('presento/css/style.css')); ?>" rel="stylesheet">
  <?php echo $__env->yieldPushContent('page_css'); ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="<?php echo e(route('welcome')); ?>">FREELANCERS CONSULTING<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
<!--       <a href="<?php echo e(route('welcome')); ?>" class="logo me-auto"><img src="<?php echo e(asset('presento/img/logo.png')); ?>" alt=""></a> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li> -->
<!--           <li><a class="nav-link scrollto" href="<?php echo e(route('instructor.explore')); ?>">Freelancers</a></li> -->
<!--           <li><a class="nav-link scrollto" href="<?php echo e(route('job.index')); ?>">Oportunidades</a></li> -->
          <li><a class="nav-link scrollto" href="<?php echo e(route('welcome')); ?>#services">Serviços</a></li>
<!--           <li><a class="nav-link scrollto " href="<?php echo e(route('welcome')); ?>#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="<?php echo e(route('welcome')); ?>#team">Team</a></li> -->
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
          <li><a class="nav-link scrollto" href="<?php echo e(route('welcome')); ?>#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
<!--       <?php if(auth()->guard('trainee')->check()): ?>
      <a href="<?php echo e(url('/instructor/register')); ?>" class="get-started-btn scrollto">PUBLICAR</a>
      <?php endif; ?> -->
      <?php if(auth()->guard('instructor')->check()): ?>
      <a href="<?php echo e(url('/instructor/edit')); ?>" class="get-started-btn scrollto">PERFIL</a>
      <?php endif; ?>
<!--       <?php if(auth()->guard('instructor')->guest()): ?> 
      <a href="<?php echo e(url('/instructor/register')); ?>" class="get-started-btn scrollto">REGISTAR-SE</a> -->
      <?php endif; ?>
      <?php if(auth()->guard('instructor')->guest()): ?> 
      <a href="<?php echo e(url('/instructor/login')); ?>" class="get-started-btn">LOGIN</a>
      <?php endif; ?>
    </div>
  </header><!-- End Header -->

  <?php echo $__env->yieldContent('hero'); ?>

  <main id="main">
    <?php echo $__env->yieldContent('main'); ?>
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
  <script src="<?php echo e(asset('presento/vendor/aos/aos.js')); ?>"></script>
  <script src="<?php echo e(asset('presento/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('presento/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('presento/vendor/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('presento/vendor/purecounter/purecounter.js')); ?>"></script>
  <script src="<?php echo e(asset('presento/vendor/swiper/swiper-bundle.min.js')); ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo e(asset('presento/js/main.js')); ?>"></script>
  <?php echo $__env->yieldPushContent('page_js'); ?>
</body>

</html><?php /**PATH /opt/lampp/htdocs/freelancers/resources/views/layouts/app.blade.php ENDPATH**/ ?>