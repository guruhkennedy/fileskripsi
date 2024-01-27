<!DOCTYPE html>
<html lang="en">

<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Septosha Hotel Booking Bootstrap Template" />
    <meta name="description" content="Fivestar - Hotel Booking Bootstrap Template" />

    <!-- title  -->
    <title>Login</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="/img/logos/favicon.png" />
    <link rel="apple-touch-icon" href="/img/logos/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/img/logos/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/img/logos/apple-touch-icon-114x114.png" />

    <!-- plugins -->
    <link rel="stylesheet" href="/css/plugins.css" />

    <!-- search css -->
    <link rel="stylesheet" href="/search/search.css" />

    <!-- core style css -->
    <link href="/css/styles.css" rel="stylesheet" />

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

        <!-- start login section -->
        <div class="d-flex align-items-center position-relative min-vh-100">

            <!-- start left content -->
            <div class="col-sm-8 center-col col-md-7 col-xl-4 d-lg-flex align-items-center px-0">

                <div class="w-100 padding-50px-all sm-padding-30px-all xs-padding-20px-all">
                    <h3>Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username"
                                        class="col-form-label text-md-end">{{ __('Username') }}</label>
                                    <input id="username" type="text" @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" required autocomplete="username"
                                        autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password"
                                        class="col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 margin-25px-top p-0">
                            <button type="submit" class="butn btn-block">Login</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- end left content -->

            <!-- start right content -->
            <div class="container-fluid bg-img height-100vh xs-display-none"
                data-background="/img/content/login-register.jpg">
            </div>
            <!-- end right content -->

        </div>
        <!-- end login section -->

    </div>
    <!-- end main-wrapper section -->

    <!-- start scroll to top -->
    <a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->

    <!-- all js include start -->

    <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>

    <!-- modernizr js -->
    <script src="/js/modernizr.js"></script>

    <!-- bootstrap -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Serch -->
    <script src="/search/search.js"></script>

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
    <script src="/js/datepicker.min.js"></script>

    <!-- isotope.pkgd.min js -->
    <script src="/js/isotope.pkgd.min.js"></script>

    <!-- custom scripts -->
    <script src="/js/main.js"></script>

    <!-- all js include end -->

</body>

</html>
