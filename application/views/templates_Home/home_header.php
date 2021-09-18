<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sportz &mdash; Colorlib Sports Team Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/jquery-ui.css">
  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/owl.theme.default.min.css">


  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/aos.css">

  <link rel="stylesheet" href="<?= base_url('assets2/'); ?>css/style.css">

</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-logo">
          <a href="#"><img src="<?= base_url('assets2/'); ?>images/logo.png" alt="Image"></a>
        </div>
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar absolute transparent" role="banner">
      <div class="py-3">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-md-3">
              <a href="#" class="text-secondary px-2 pl-0"><span class="icon-facebook"></span></a>
              <a href="#" class="text-secondary px-2"><span class="icon-instagram"></span></a>
              <a href="#" class="text-secondary px-2"><span class="icon-twitter"></span></a>
              <a href="#" class="text-secondary px-2"><span class="icon-youtube"></span></a>
            </div>
            <div class="col-6 col-md-9 text-right">
              <div class="d-inline-block"><a href="#" class="text-secondary p-2 d-flex align-items-center"><span class="icon-envelope mr-3"></span> <span class="d-none d-md-block">youremail@domain.com</span></a></div>
              <div class="d-inline-block"><a href="#" class="text-secondary p-2 d-flex align-items-center"><span class="icon-phone mr-0 mr-md-3"></span> <span class="d-none d-md-block">+1 232 3532 321</span></a></div>
            </div>
          </div>
        </div>
      </div>
      <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
        <div class="container position-relative">
          <div class="site-logo">
            <a href="index.html"><img src="<?= base_url('assets2/'); ?>images/logo.png" alt=""></a>
          </div>

          <div class="d-inline-block d-md-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="<?= base_url('home'); ?>">Home</a></li>
            <li><a href="<?= base_url('home'); ?>">About</a></li>
            <li><a href="<?= base_url('home'); ?>">Komunitas</a></li>
            <li><a href="<?= base_url('home'); ?>">Event</a></li>
            <li><a href="<?= base_url('home'); ?>">Product</a></li>
            <li><a href="<?= base_url('saran'); ?>">Forum</a></li>
              <?php if ($this->session->userdata('email')) { ?>
            <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
            <?php } ?>
            <?php if (!$this->session->userdata('email')) { ?>
            <li><a href="<?= base_url('auth'); ?>">Login</a></li>
            <li><a href="<?= base_url('auth/register'); ?>">Register</a></li>
          <?php } ?>
          </ul>
        </div>
      </nav>
    </header>