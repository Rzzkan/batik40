<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>BATIK 4.0</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('tema/img/logo_kecil.png') }}" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">

    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/LineIcons.css') }}">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">

    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/magnific-popup.css') }}">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/default.css') }}">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img height="48px" src="{{ asset('tema/img/logo_batik_4_0_gelap.png') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto mr-5">
                                    <li class="nav-item active">
                                        <a href="#home">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#about">Tentang Kami</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#contact">Kontak</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" href="{{ route('login') }}">Login</a>
                                <a class="main-btn" href="{{ route('register') }}">Register</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->

        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url(assets/images/header-hero.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-hero-content">
                            <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Setiap</b> <span>Transaksi</span> Akan Dibuat <b>Menyenangkan.</b></h1>
                            <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Membuat desain batik favoritmu lalu mencetaknya. Kami antar sampai ke rumahmu dengan aman.</p>
                            <a href="{{ route('login') }}" class="main-btn mt-5" data-wow-duration="1s" data-wow-delay="0.8s">Mulai Sekarang</a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
                <div class="image">
                    <img class="pl-5 pt-5" src="{{ asset('tema/img/img_landing_1.png') }}" alt="Hero Image">
                </div>
            </div> <!-- header hero image -->

        </div> <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== OUR SERVICE PART START ======-->

    <section id="about" class="about-area pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-9">
                    <div class="section-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6 class="sub-title">Jenis Batik</h6>
                        <h4 class="title">Jenis Batik <span>Custome!</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="our-services-tab pt-30">
                        <ul class="nav justify-content-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="kawung-tab" data-toggle="tab" href="#kawung" role="tab" aria-controls="kawung" aria-selected="true">
                                    <span>Batik Kawung</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="parang-tab" data-toggle="tab" href="#parang" role="tab" aria-controls="parang" aria-selected="false">
                                    <span>Batik Parang</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a id="sidomukti-tab" data-toggle="tab" href="#sidomukti" role="tab" aria-controls="sidomukti" aria-selected="false">
                                    <span>Batik Sidomukti</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a id="megamendung-tab" data-toggle="tab" href="#megamendung" role="tab" aria-controls="megamendung" aria-selected="false">
                                    <span>Batik Mega Mendung</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kawung" role="tabpanel" aria-labelledby="kawung-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{ asset('tema/img/batik_1.png') }}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title"><span>Batik </span>Kawung</h3>
                                            <p class="text"><strong>Batik Kawung </strong>motif batik yang bentuknya berupa bulatan mirip buah kawung (sejenis kelapa atau kadang juga dianggap sebagai aren atau kolang-kaling) yang ditata rapi secara geometris. <br>Kadang, motif ini juga ditafsirkan sebagai gambar bunga lotus (teratai) dengan empat lembar mahkota bunga yang merekah. Lotus adalah bunga yang melambangkan umur panjang dan kesucian. </p>

                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>

                            <div class="tab-pane fade" id="parang" role="tabpanel" aria-labelledby="parang-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{ asset('tema/img/batik_2.png') }}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title"><span>Batik </span>Parang</h3>
                                            <p class="text"><strong>Batik Parang</strong> merupakan salah satu motif batik yang paling tua di Indonesia. Parang berasal dari kata Pereng yang berarti lereng. Perengan menggambarkan sebuah garis menurun dari tinggi ke rendah secara diagonal. <br>Susunan motif S jalin-menjalin tidak terputus melambangkan kesinambungan. Bentuk dasar huruf S diambil dari ombak samudra yang menggambarkan semangat yang tidak pernah padam. Batik ini merupakan batik asli Indonesia yang sudah ada sejak zaman keraton Mataram Kartasura (Solo). </p>

                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>

                            <div class="tab-pane fade" id="sidomukti" role="tabpanel" aria-labelledby="sidomukti-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{ asset('tema/img/batik_3.png') }}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title"><span>Batik </span>Sidomukti</h3>
                                            <p class="text">
                                                <strong>Batik Sidomukti</strong> merupakan salah satu batik yang berkembang di Keraton Surakarta. Batik ini merupakan perkembangan dari batik sidomulyo yang telah ada sejak zaman Kesultanan mataram.
                                                <br>
                                                Keunikan batik Sidomukti serta coraknya yang khas dan keterikatannya yang kental dengan budaya Jawa menjadikan batik ini banyak diburu oleh para pecinta batik dan penikmat budaya Jawa. Asal batik Sidomukti memang dari Solo, namun saat ini produksi batik ini telah menyebar di kota-kota lain.
                                                <br>
                                                Jenis batik Sidomukti dapat dibedakan dari daerah penghasilnya. Hal ini karena masing-masing daerah penghasil batik memiliki ciri batik Sidomukti yang berbeda satu dengan yang lainnya diantaranya adalah batik sidomukti Solo, batik sidomukti Yogyakarta, batik sidomukti Pekalongan dan batik sidomukti Magetan.
                                            </p>

                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>


                            <div class="tab-pane fade" id="megamendung" role="tabpanel" aria-labelledby="megamendung-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{ asset('tema/img/batik_4.png') }}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title"><span>Batik </span>Mega Mendung</h3>
                                            <p class="text">
                                                <strong>Batik Mega Mendung</strong> (Hanacaraka:ꦩꦼꦒꦩꦼꦤ꧀ꦢꦸꦁ) merupakan karya seni batik yang identik dan bahkan menjadi ikon batik daerah Cirebon[1] dan daerah Indonesia lainnya. Motif batik ini mempunyai kekhasan yang tidak ditemui di daerah penghasil batik lain. Bahkan karena hanya ada di Cirebon dan merupakan mahakarya, Departemen Kebudayaan dan Pariwisata akan mendaftarkan motif megamendung ke UNESCO untuk mendapatkan pengakuan sebagai salah satu warisan dunia.
                                                <br>
                                                Motif megamendung sebagai motif dasar batik sudah dikenal luas sampai ke manca negara. Sebagai bukti ketenarannya, motif megamendung pernah dijadikan cover sebuah buku batik terbitan luar negeri yang berjudul Batik Design, karya seorang berkebangsaan Belanda bernama Pepin van Roojen. Kekhasan motif megamendung tidak saja pada motifnya yang berupa gambar menyerupai awan dengan warna-warna tegas, tetapi juga nilai-nilai filosofi yang terkandung di dalam motifnya. Hal ini berkaitan erat dengan sejarah lahirnya batik secara keseluruhan di Cirebon.
                                            </p>

                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- our services tab -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== OUR SERVICE PART ENDS ======-->

    <!--====== SERVICE PART START ======-->

    <section id="service" class="service-area pt-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6 class="sub-title">Desain Batik</h6>
                        <h4 class="title">Desain Sendiri <span>Batikmu!</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="service-wrapper mt-60 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <!-- <img src="{{ asset('landing/images/service-1.png') }}" alt="Icon"> -->
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">1. Login Aplikasi</h4>
                                <h4 class="service-title">2. Mulai Desain Batikmu</h4>
                            </div>
                            <div class="shape shape-1">
                                <img src="{{ asset('landing/images/shape/shape-1.svg') }}" alt="shape">
                            </div>
                            <div class="shape shape-2">
                                <img src="{{ asset('landing/images/shape/shape-2.svg') }}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service service-border d-flex">
                            <div class="service-icon">
                                <!-- <img src="{{ asset('landing/images/service-2.png') }}" alt="Icon"> -->
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">3. Order kain batik hasil desainmu</h4>
                                <h4 class="service-title">4. Tunggu konfirmasi</h4>
                            </div>
                            <div class="shape shape-3">
                                <img src="{{ asset('landing/images/shape/shape-3.svg') }}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <!-- <img src="{{ asset('landing/images/service-3.png') }}" alt="Icon"> -->
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">5. Batik sampai ditangan melalui kurir</h4>
                            </div>
                            <div class="shape shape-4">
                                <img src="{{ asset('landing/images/shape/shape-4.svg') }}" alt="shape">
                            </div>
                            <div class="shape shape-5">
                                <img src="{{ asset('landing/images/shape/shape-5.svg') }}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="service-btn text-center pt-25 pb-15">
                            <a class="main-btn main-btn-2" href="{{ route('login') }}">Mulai Desain Sendiri</a>
                        </div> <!-- service btn -->
                    </div>
                </div> <!-- row -->
            </div> <!-- service wrapper -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICE PART ENDS ======-->

    <!--====== TESTIMONIAL PART START ======-->

    <section id="testimonial" class="testimonial-area pt-70 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial-left-content mt-45 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="section-title">
                            <h6 class="sub-title">Bergabung</h6>
                            <h4 class="title">Jadilah Member</h4>
                        </div> <!-- section title -->
                        <ul class="testimonial-line">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p class="text">Jadilah member dan dapatkan berbagai keuntungan, Transaksi minimal <strong>10jt </strong> dan dapatkan status membermu.</p>
                    </div> <!-- testimonial left content -->
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-right-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="quota">
                            <i class="lni-quotation"></i>
                        </div>
                        <div class="testimonial-content-wrapper testimonial-active">
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis nunc turp.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="{{ asset('landing/images/author-1.jpg') }}" alt="author">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">John Doe</h5>
                                            <span class="sub-title">CEO, Alphabet</span>
                                        </div>
                                    </div>
                                    <div class="author-review">
                                        <ul class="star">
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                        </ul>
                                        <span class="review">( 7 Reviews )</span>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis nunc turp.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="{{ asset('landing/images/author-2.jpg') }}" alt="author">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">John Doe</h5>
                                            <span class="sub-title">CEO, Alphabet</span>
                                        </div>
                                    </div>
                                    <div class="author-review">
                                        <ul class="star">
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                        </ul>
                                        <span class="review">( 7 Reviews )</span>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis nunc turp.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="{{ asset('landing/images/author-3.jpg') }}" alt="author">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">John Doe</h5>
                                            <span class="sub-title">CEO, Alphabet</span>
                                        </div>
                                    </div>
                                    <div class="author-review">
                                        <ul class="star">
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                        </ul>
                                        <span class="review">( 7 Reviews )</span>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                        </div> <!-- testimonial content wrapper -->
                    </div> <!-- testimonial right content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TESTIMONIAL PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-30 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="sub-title">Kontak Kami</h6>
                        <h4 class="title">Hubungi <span>kami sekarang.</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info pt-30">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="contact-info-icon">
                                <i class="lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">Alamat. Batik Butimo <br>
                                    (Kabrokan Wetan, Sendangsari, Kec. Pajangan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55751)</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="contact-info-icon">
                                <i class="lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">Email. butimo.official@gmail.com</p>
                                <p class="text">Call/WA. 0895802090232</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                            <div class="contact-info-icon">
                                <i class="lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">Facebook: https://www.facebook.com/BatikButimoIndonesia</p>
                                <p class="text">IG: @butimo.batik</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->

        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <footer id="footer" class="footer-area bg_cover" style="background-image: url(assets/images/footer-bg.jpg)">
        <div class="container">
            <div class="footer-widget pt-30 pb-70">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 order-sm-1 order-lg-1">
                        <div class="footer-about pt-40">
                            <a href="#">
                                <img height="48px" src="{{ asset('tema/img/logo_batik_4_0_gelap.png') }}" alt="Logo">
                            </a>
                            <p class="text">Batik 4.0 adalah sebuah inovasi integrasi desain dan manufaktur batik berbasis cloud web dengan kolaborasi teknologi dan budaya.</p>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-3 order-lg-2">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">SERVICES</h5>
                            </div>
                            <ul>
                                <li><a href="#">Catalogue Design</a></li>
                                <li><a href="#">Down Payment (DP) System</a></li>
                                <li><a href="#">Production Tracking</a></li>
                                <li><a href="#">Order Tracking</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-4 order-lg-3">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">ABOUT US</h5>
                            </div>
                            <ul>
                                <li><a href="#">Overview</a></li>
                                <li><a href="#">Why us</a></li>
                                <li><a href="#">Awards</a></li>
                                <li><a href="#">Term Agreement</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-2 order-lg-4">
                        <div class="footer-contact pt-40">
                            <div class="footer-title">
                                <h5 class="title">Contact Info</h5>
                            </div>
                            <div class="contact pt-10">
                                <p class="text">Kabrokan Wetan, Sendangsari, Kec. Pajangan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55751</p>
                                <p class="text">butimo.official@gmail.com</p>
                                <p class="text">0895802090232</p>

                                <ul class="social mt-40">
                                    <li><a href="#"><i class="lni-facebook"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- contact -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright text-center">
                <p class="text">© 2022 Modified By <a href="{{ route('home') }}" rel="nofollow">Batik 4.0</a> All Rights Reserved.</p>
            </div>
        </div> <!-- container -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="{{ asset('landing/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('landing/js/vendor/modernizr-3.7.1.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('landing/js/slick.min.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ asset('landing/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/js/isotope.pkgd.min.js') }}"></script>

    <!--====== Counter Up js ======-->
    <script src="{{ asset('landing/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.counterup.min.js') }}"></script>

    <!--====== Circles js ======-->
    <script src="{{ asset('landing/js/circles.min.js') }}"></script>

    <!--====== Appear js ======-->
    <script src="{{ asset('landing/js/jquery.appear.min.js') }}"></script>

    <!--====== WOW js ======-->
    <script src="{{ asset('landing/js/wow.min.js') }}"></script>

    <!--====== Headroom js ======-->
    <script src="{{ asset('landing/js/headroom.min.js') }}"></script>

    <!--====== Jquery Nav js ======-->
    <script src="{{ asset('landing/js/jquery.nav.js') }}"></script>

    <!--====== Scroll It js ======-->
    <script src="{{ asset('landing/js/scrollIt.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('landing/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('landing/js/main.js') }}"></script>

</body>

</html>