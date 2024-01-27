@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="">
        <div class="container">
            <h1>Tentang Kami</h1>
            <ul>
                <li>
                    <a href="index.html">Beranda</a>
                </li>
                <li>
                    <a href="#!">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start gallery section -->
    <section>
        <div class="container">
            <div class="width-100">
                {!! html_entity_decode($site->about) !!}
            </div>
        </div>
    </section>
    <!-- end gallery section -->
@endsection
