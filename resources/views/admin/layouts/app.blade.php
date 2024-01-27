@php
    $site = \App\Models\Site::first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
    <!-- CSS Libraries -->
    @stack('customStyle')
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-ungu" aria-label="Fifth navbar example">
        <div class="container-fluid py-1">
            <div class="d-flex flex-column">
                <a class="navbar-brand" href="{{ url('admin/home') }}">Administrator</a>
                <h6 class="text-white">(Sistem Informasi Persewaan Gedung {{ $site->name }})</h6>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
                aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <div class="brand-text" aria-current="page" href="{{ url('akun') }}">
                            {{ $site->name }}
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('akun') }}">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer" aria-current="page"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out me-0"></i> Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <!-- content -->
    <section>
        <!-- sidebar -->
        <div class="container-fluid">
            <div class="row">
                {{-- footer --}}
                @include('admin.layouts.sidebar')
                <div class="col-md-9 bg-bg p-4">
                    <!-- Main Content -->
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    {{-- footer --}}
    @include('admin.layouts.footer')


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <!-- Page Specific JS File -->
    @stack('customScript')
</body>

</html>
