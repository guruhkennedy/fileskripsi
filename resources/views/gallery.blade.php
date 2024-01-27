@extends('layouts.app')
@section('title', 'Galeri')
@section('content')
    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="">
        <div class="container">
            <h1>Galeri</h1>
            <ul>
                <li>
                    <a href="index.html">Beranda</a>
                </li>
                <li>
                    <a href="#!">Galeri</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start gallery section -->
    <section>
        <div class="container">
            <div class="row">

                <!-- start links -->
                {{-- <div class="filtering col-sm-12 text-center">
                    <span data-filter='*' class="active">All</span>
                    <span data-filter='.food'>Food</span>
                    <span data-filter='.d'>Relaxation</span>
                    <span data-filter='.vacation'>Vacation</span>
                </div> --}}
                <!-- end links -->
                <div class="gallery text-center width-100">
                    @foreach ($galeri as $g)
                        <div class="col-lg-3 col-md-6 items">
                            <div class="project-grid">
                                <div class="project-grid-img"><img src={{ asset('/img/gedung/' . $g->url) }}
                                        alt="{{ $g->tag }}" />
                                </div>
                                <div class="project-grid-overlay">
                                    <div class="width-100">
                                        <a href={{ asset('/img/gedung/' . $g->url) }} class="popimg"><span
                                                class="ti-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end gallery section -->
@endsection
