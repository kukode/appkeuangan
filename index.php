<?php 

error_reporting("E_ALL ^ E_NOTICE");
include 'lib/db.php';
include 'navigation.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Setda Kabupaten Bogor</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/icon.png">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet"> 
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsparallaxer.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
  <link rel="stylesheet" href="assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
  <link rel="stylesheet" href="assets/vendor/animate.css">
  <link rel="stylesheet" href="assets/vendor/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="assets/vendor/typedjs/typed.css">
  <link rel="stylesheet" href="assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="assets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="assets/css/unify-core.css">
  <link rel="stylesheet" href="assets/css/unify-components.css">
  <link rel="stylesheet" href="assets/css/unify-globals.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
  <main style="font-family: 'Space Mono', monospace;font-size: 14px;">



    <!-- Header -->
    <header id="js-header" class="u-header u-header--static">
      <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
          <div class="container">
            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
            </button>
            <!-- End Responsive Toggle Button -->

            <!-- Logo -->
            <a href="http://localhost/appkeuangansetda/" class="navbar-brand">
              <img src="assets/img/logo.png" alt="Unify Logo">
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--lg" id="navBar">
              <ul class="navbar-nav text-uppercase g-pos-rel g-font-weight-600 ml-auto">
                <!-- Intro -->
                <li class="nav-item  g-mx-10--lg g-mx-15--xl">
                  <a class="nav-link g-py-7 g-px-0" href="http://localhost/appkeuangansetda/">Beranda</a>
                </li>
                <!-- End Intro -->

                

                <!-- Features -->
                <li class="nav-item hs-has-sub-menu  g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <a id="nav-link--features" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features">Bagian</a>

                  <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu--features" aria-labelledby="nav-link--features">
                   
                    <li class="dropdown-item ">
                      <a class="nav-link" href="?page=umum">Bagian Umum</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Keuangan</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Kerjasama</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Perundang - Undangan</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Administrasi Pemerintahan</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Kesejahteraan Rakyat</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Perekonomian</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Organisasi</a>
                    </li>
                    
                    <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Progdalbang</a>
                    </li>

                    <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Pengadaan Barang/Jasa</a>
                    </li>

                    <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Bagian Bantuan Hukum</a>
                    </li>
                   
                  </ul>
                </li>
                <!-- End Features -->


                <!-- Features -->
                <li class="nav-item hs-has-sub-menu  g-mx-10--lg g-mx-15--xl" data-animation-in="fadeIn" data-animation-out="fadeOut">
                  <a id="nav-link--features" class="nav-link g-py-7 g-px-0" href="#!" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu--features">Asisten</a>

                  <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu--features" aria-labelledby="nav-link--features">
                   
                    <li class="dropdown-item ">
                      <a class="nav-link" href="?page=aspem">Asisten Pemerintahan</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Asisten Perekonomian dan Pembangunan</a>
                    </li>

                     <li class="dropdown-item ">
                      <a class="nav-link" href="unify-main/shortcodes/headers/index.html">Asisten Administrasi</a>
                    </li>

                    
                   
                  </ul>
                </li>
                <!-- End Features -->
                
              </ul>
            </div>
            <!-- End Navigation -->

            
          </div>
        </nav>
      </div>
    </header>
    <!-- End Header -->
    <?php echo $content; ?>
    

    

    <!-- Copyright Footer -->
    <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20 text-center" >
      <div class="container">
       
              <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md ">2018 &copy; Siratris</small>
   
      </div>
    </footer>
    <!-- End Copyright Footer -->
    <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="assets/vendor/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="assets/vendor/slick-carousel/slick/slick.js"></script>
  <script src="assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
  <script src="assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
  <script src="assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
  <script src="assets/vendor/fancybox/jquery.fancybox.min.js"></script>
  <script src="assets/vendor/typedjs/typed.min.js"></script>

  <!-- JS Unify -->
  <script src="assets/js/hs.core.js"></script>
  <script src="assets/js/components/hs.carousel.js"></script>
  <script src="assets/js/components/hs.header.js"></script>
  <script src="assets/js/helpers/hs.hamburgers.js"></script>
  <script src="assets/js/components/hs.tabs.js"></script>
  <script src="assets/js/components/hs.popup.js"></script>
  <script src="assets/js/components/text-animation/hs.text-slideshow.js"></script>
  <script src="assets/js/components/hs.go-to.js"></script>

  <!-- JS Customization -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    

  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
    $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of popups
        $.HSCore.components.HSPopup.init('.js-fancybox');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of text animation (typing)
        $(".u-text-animation.u-text-animation--typing").typed({
          strings: [
            "an awesome template",
            "perfect template",
            "just like a boss"
          ],
          typeSpeed: 60,
          loop: true,
          backDelay: 1500
        });
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>
   <script type="text/javascript">
        $(document).ready(function(){

            $('#asisten').DataTable({
              scrollX : true
            });
            $('#bagian').DataTable({
              scrollX : true
            });

            $('.slider').bxSlider({
              mode : 'horizontal',
              auto : true,
              touchEnabled : true,
              controls : false
            });
          });
    </script>






</body>

</html>