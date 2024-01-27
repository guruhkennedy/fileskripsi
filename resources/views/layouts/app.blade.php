<!DOCTYPE html>
<html lang="en">

@php $site = \App\Models\Site::first(); @endphp

<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Septosha Hotel Booking Bootstrap Template" />
    <meta name="description" content="Fivestar - Hotel Booking Bootstrap Template" />

    <!-- title  -->
    <title>@yield('title') - {{ $site->name }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="/img/{{ $site->favicon }}" />
    <link rel="apple-touch-icon" href="/img/logos/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/img/logos/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/img/logos/apple-touch-icon-114x114.png" />

    <!-- plugins -->
    <link rel="stylesheet" href="/css/plugins.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- search css -->
    <link rel="stylesheet" href="/search/search.css" />

    <!-- core style css -->
    <link href="/css/styles.css" rel="stylesheet" />

    @stack('customStyle')

    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $.datepicker.setDefaults(
                $.extend({
                        'dateFormat': 'dd-mm-yy'
                    },
                    $.datepicker.regional['id']
                )
            );
            $("#tgl").datepicker({
                dateFormat: 'dd MM yy',
                minDate: 0,
                "setDate": new Date()
            });
        });
    </script>
</head>

<body>

    <!-- start page loading -->
    <div id="preloader">
        <div class="row loader">
            <div class="loader-icon"></div>
        </div>
    </div>
    <!-- end page loading -->

    <!-- start main-wrapper section -->
    <div class="main-wrapper">

        <!-- start header section -->
        <header>

            <div class="navbar-default ">

                <!-- start top search -->
                <div class="top-search bg-black">
                    <div class="container">
                        <form class="search-form" action="{{ url('order') }}" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search font-size18 text-white"
                                        type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="kode"
                                    autocomplete="off" placeholder="Kode pesanan...">
                                <span class="input-group-addon close-search"><i
                                        class="fas fa-times font-size18 line-height-28 margin-5px-top"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font sm-padding-10px-tb">
                                <nav class="navbar navbar-expand-lg navbar-light no-padding">

                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="{{ url('/') }}" class="navbar-brand logo4">
                                            <img id="logo" src="img/{{ $site->logo }}" alt="logo"
                                                class="h-20" height="70px" width="70px"
                                                style="object-fit: contain">
                                        </a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler" style="top: 13px"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ml-auto" id="nav">
                                        <li><a href="{{ url('/') }}">Beranda</a>
                                        </li>
                                        <li class="has-sub"><span class="submenu-button"></span><a
                                                href="#">Profile</a>
                                            <ul>
                                                <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                                                <li><a href="{{ url('syarat-ketentuan') }}">Syarat & Ketentuan</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ url('gallery') }}">Galeri</a></li>
                                        <li class="has-sub"><span class="submenu-button"></span><a
                                                href="#">Reservasi</a>
                                            <ul>
                                                <li><a href="{{ url('cek-reservasi') }}">Cek Reservasi</a></li>
                                                <li><a href="{{ url('jadwal') }}">Cek Jadwal</a></li>
                                                <li><a href="{{ url('pembatalan') }}">Pembatalan</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!-- end menu area -->

                                    <!-- start atribute navigation -->
                                    {{-- <div class="attr-nav sm-no-margin sm-margin-65px-right xs-margin-50px-right">
                                        <ul class="no-margin-top">
                                            <li class="search"><a href="#"><i class="fas fa-search"></i></a>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    <!-- end atribute navigation -->

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- end header section -->

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- start footer section -->
        <footer>
            <div class="footer-area padding-70px-tb md-padding-40px-tb xs-padding-30px-tb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 sm-margin-30px-bottom">
                            <img src="img/{{ $site->logo }}"
                                class="width-70 margin-30px-bottom xs-margin-20px-bottom" alt="" />
                            <address class="width-70 no-margin-bottom">{{ $site->address }}
                            </address>
                        </div>

                        <div class="col-lg-3 col-sm-6 sm-margin-30px-bottom">
                            <h3 class="footer-title-style1">Reservation</h3>
                            <ul class="list-style-1 no-margin">
                                <li>
                                    <span><strong>Email:</strong> {{ $site->email }}</span>
                                </li>
                                <li>
                                    <span><strong>Tel:</strong> {{ $site->phone }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-sm-6 mobile-margin-30px-bottom">
                            <h3 class="footer-title-style1">Useful Links</h3>
                            <ul class="list-style-1 no-margin-bottom">
                                <li><a href="{{ url('jadwal') }}">Cek Jadwal</a></li>
                                <li><a href="{{ url('syarat-ketentuan') }}">Syarat & Ketentuan</a></li>
                                <li><a href="{{ url('about') }}">Tentang Kami</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <h3 class="footer-title-style1">Social Links</h3>
                            <ul class="social-icon-style no-margin">
                                <li>
                                    <a href="{{ $site->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $site->twitter }}" target="_blank"><i
                                            class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $site->instagram }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $site->whatsapp }}" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

            <div class="footer-bar xs-padding-15px-tb">
                <div class="container">
                    <div class="text-center">
                        <p>&copy; {{ now()->year }} {{ $site->name }}</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer section -->

    </div>
    <!-- end main-wrapper section -->

    <!-- start scroll to top -->
    <a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- modernizr js -->
    <script src="/js/modernizr.js"></script>

    <!-- bootstrap -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Serch -->
    <script src="search/search.js"></script>

    <!-- navigation -->
    <script src="/js/nav-menu.js"></script>

    <!-- tab -->
    <script src="/js/easy.responsive.tabs.js"></script>

    <!-- owl carousel -->
    <script src="/js/owl.carousel.js"></script>

    <!-- jquery.counterup.min -->
    <script src="/js/jquery.counterup.min.js"></script>

    <!-- stellar js -->
    <script src="/js/jquery.stellar.min.js"></script>

    <!-- waypoints js -->
    <script src="/js/waypoints.min.js"></script>

    <!-- countdown js -->
    <script src="/js/countdown.js"></script>

    <!-- jquery.magnific-popup js -->
    <script src="/js/jquery.magnific-popup.min.js"></script>

    <!-- datepicker js -->
    {{-- <script src="/js/datepicker.min.js"></script> --}}

    <!-- isotope.pkgd.min js -->
    <script src="/js/isotope.pkgd.min.js"></script>

    <!-- custom scripts -->
    <script src="/js/main.js"></script>

    <!-- all js include end -->
    @stack('customScript')

</body>

</html>
