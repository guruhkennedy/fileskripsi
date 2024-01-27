@extends('layouts.app')

@section('title', 'Cek Reservasi')

@section('content')
    <!-- start page title section -->
    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="">
        <div class="container">
            <h1>Cek Reservasi</h1>
            <ul>
                <li>
                    <a href="index.html">Beranda</a>
                </li>
                <li>
                    <a href="#!">Cek Reservasi</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- end page title section -->

    <!-- start gallery section -->
    <section>
        <div class="container">
            @if (session('success'))
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-heading">
                        <h2>Cek Reservasi</h2>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contact-form">
                        <form action="{{ route('cek-reservasi') }}" method="POST" id="cek-reservasi-form"
                            autocomplete="off">
                            @csrf
                            <div class="row align-items-end">
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label for="kode">Kode Booking</label>
                                        <input id="kode" name="kode" placeholder="GDXXXXXX" type="text"
                                            name="kode" value="{{ old('kode') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="butn">Cari</button>
                                </div>
                            </div>
                            @error('kode')
                                <small id="passwordHelp" class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- end gallery section -->
@endsection
